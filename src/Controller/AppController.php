<?php

namespace App\Controller;
use App\Entity\LetterContent;
use App\Form\LettreType;
use Doctrine\ORM\EntityManagerInterface;
use OpenAI;
use App\Form\CoverType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/app/create', name: 'app_app_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $letter = new LetterContent();
        $form = $this->createForm(LettreType::class, $letter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $client = OpenAI::client('');

            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'Vous êtes un assistant spécialisé dans la création de lettre de motivation.'],
                    ['role' => 'user', 'content' => 'Mon nom est' . $letter->getSurname() . ' ' . $letter->getName() . '.'],
                    ['role' => 'user', 'content' => 'Diplomes : ' . $letter->getDiplome() . '.'],
                    ['role' => 'user', 'content' => 'Poste cible :' . $letter->getJob() . '.'],
                    ['role' => 'user', 'content' => 'Annonce cible :' . $letter->getAdvertisement() . "De la part de l'entreprise : " . $letter->getEnterprise() . '.' ],
                    ['role' => 'user', 'content' => 'Ecris une lettre de motivation convaincante et personnalisée avec une bonne mise en forme professionnelle',]

                ],
            ]);
            $message = $response->toArray()['choices'][0]['message']['content'] ;
            $letter->setResponse($message);
            $entityManager->persist($letter);
            $entityManager->flush();
            $this->addFlash('success', 'Votre lettre a été genérée');
        }
        return $this->render('app/create.html.twig', [
            'controller_name' => 'AppController',
            'form' => $form,
            'message' => $message ?? null,
        ]);
    }
    #[Route('app/', name: 'app_app')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $letterRepo = $entityManager->getRepository(LetterContent::class);
        $letter = $letterRepo->findAll();

        return $this->render('app/index.html.twig', [
            'letter' => $letter
        ]);
    }
    #[Route('app/letter/{id}', name: 'smartletter_show')]
    public function show(Request $request, EntityManagerInterface $entityManager): Response
    {
        $letterRepo = $entityManager->getRepository(LetterContent::class);
        $letter = $letterRepo->findAll();

        return $this->render('app/show.html.twig', [
            'letter' => $letter
        ]);
    }
}