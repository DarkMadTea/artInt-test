<?php


namespace App\Controller\Main;


use App\Controller\BaseController;
use App\Entity\AdditionalData;
use App\Entity\User;
use App\Form\AdditionalDataType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends BaseController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return RedirectResponse|Response
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $userAdmin = $this->getDoctrine()->getRepository(User::class)->findBy(array('email' => "admin@admin.com"));
        $users = $this->getDoctrine()->getRepository(AdditionalData::class)->findAll();
        $forRender = parent::renderDefault();

        //сделал автоматическое добавление админа, чтобы не надо было вручную добавлять его через бд :3
        if (!$userAdmin){
            $em = $this->getDoctrine()->getManager();
            $admin = new User();
            $admin->setEmail('admin@admin.com');
            $admin->setRoles((array)"ROLE_ADMIN");
            $encoded = $encoder->encodePassword($admin, '123123');
            $admin->setPassword($encoded);

            $em->persist($admin);
            $em->flush();
        }

        $forRender['users'] = $users;
        return $this->render('main/index.html.twig', $forRender);
    }

    /**
     * @Route("/allusers", name="allusers")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function admin(Request $request)
    {
        $users = $this->getDoctrine()->getRepository(AdditionalData::class)->findAll();

        $forRender = parent::renderDefault();

        $forRender['users'] = $users;
        return $this->render('main/admin.html.twig', $forRender);
    }
}