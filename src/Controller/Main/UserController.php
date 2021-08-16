<?php


namespace App\Controller\Main;


use App\Controller\BaseController;
use App\Entity\AdditionalData;
use App\Form\AdditionalDataType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends BaseController
{
    /**
     * @Route("/user", name="user")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function index(Request $request)
    {
        $forRender = parent::renderDefault();

        $userData = $this->getDoctrine()->getRepository(AdditionalData::class)->findAll();
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser()->getId();

        $checkIfExist = $this->getDoctrine()->getRepository(AdditionalData::class)->findBy(array('username' => $this->getUser()->getId()));

        $additionalData = new AdditionalData();
        $form = $this->createForm(AdditionalDataType::class, $additionalData, [
            'action' => $this->generateUrl("user", [
                'username_id' => $user
            ]),
            'method' => 'POST',
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $additionalData->setAddress($form->get('address')->getData());
            $additionalData->setReview($form->get('review')->getData());
            $additionalData->setUsername($user);
            $em->persist($additionalData);
            $em->flush();
            return $this->redirectToRoute('user');
        }
        $forRender['form'] = $form->createView();
        $forRender['userData'] = $userData;
        return $this->render('main/user.html.twig', $forRender);
    }
}