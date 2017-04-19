<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Vote;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Film;
use AppBundle\Form\UtilisateurType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="acc")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/inscrire", name="inscrire")
     */
    public function inscrireAction(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->get('form.factory')->create(new UtilisateurType, $utilisateur);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            
            $em->flush();
        
            $request->getSession()->getFlashBag()->add('notice', 'Utilisateur enregistré.');
            
            $id = $utilisateur->getId();
            return $this->redirectToRoute('vote', array('id' => $id));
        }
        
        
        
        return $this->render('default/inscrire.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/votelistfilms", name="listfilms")
     */
    public function listFilmsPourVoteAction(Request $request)
    {
        
        if ($request->isXmlHttpRequest())
        {
            $idSaga = $request->get('id_saga');
            $periode = $request->get('periode');
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Film');
            $filmsAvoter = $repository->findMovieByPeriodAndSaga($idSaga, $periode);
        }
    }
    
    /**
     * @Route("/note", name="note")
     */
    public function noteAction(Request $request)
    {
        $vote = new Vote();
        $utilisateur = new Utilisateur();
        $film = new Film();
        if ($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $idUt = $request->get('id_utilisateur');
            $note = $request->get('note');
            $idFilm = $request->get('id_film');
            $film = $em->getReference('AppBundle\Entity\Film', $idFilm);
            $utilisateur = $em->getReference('AppBundle\Entity\Utilisateur', $idUt);
            $vote->setNote($note);
            $vote->setIdFilm($film);
            $vote->setIdUtilisateur($utilisateur);
            $em->persist($vote);
            $em->flush();
            $rep = $request->getSession()->getFlashBag()->add('notice', 'Vote enregistré.');
            
        }
            
        $rep = array("response" => "vote enregistré");
        $response = new Response(json_encode($rep));
        $response->headers->set('Content-Type', 'application/json; charset=utf-8');

        return $response;
    }
    
    /**
     * @Route("/vote/{id}", name="vote")
     */
    public function voteAction($id, Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idSaga = $request->get('saga');
            $periode = $request->get('periode');
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Film');
            $filmsAvoter = $repository->findMovieByPeriodAndSaga($idSaga, $periode);
            
            $template = $this->render('default/listfilms.html.twig', array('filmsAvoter' => $filmsAvoter))->getContent();
            
            $json = json_encode($template);
            $response = new Response($json, 200);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
            //$response = new Response();
            //$projets = json_encode(array('projet' => $filmsAvoter));
            //$response->headers->set('Content-Type', 'application/json');
            //$response->setStatusCode(200);
            //$response->setContent($projets);
            
            //return $this->render('default/listfilms.html.twig', array('filmsAvoter'=>$response))->getContent();
            
            
            
        }
        else{
            return $this->render('default/vote.html.twig', array(
            ));
        }
    
    }
    
    /**
     * @Route("/films", name="homepage")
     */
    public function filmsAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Film');
        $films = $repository->findMoviesPerAverage();
        
        return $this->render('default/films.html.twig', array(
            'films' => $films
        ));
    }
    
    /**
     * @Route("/film/{id}", name="film")
     */
    public function filmAction($id)
    {
        
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Film');
        //$film = $repository->find($id);
        $film = $repository->findMovieByIdWithAverage($id);
      // var_dump($film); exit();
      
        
        if (null === $film) {
            throw new NotFoundHttpException("le film id : ".$id." n'existe pas.");
        }
        
             
        return $this->render('default/film.html.twig', array(
            'film' => $film,
            //'saga' => $film->getIdSaga()
            
        ));
    }
}
