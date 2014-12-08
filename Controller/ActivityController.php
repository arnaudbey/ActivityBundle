<?php

namespace Innova\ActivityBundle\Controller;

use Claroline\CoreBundle\Entity\Workspace\Workspace;
use Innova\ActivityBundle\Entity\ActivitySequence;
use Innova\ActivityBundle\Entity\Activity;
use Innova\ActivityBundle\Form\Handler\PathHandler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormFactoryInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider;
use Symfony\Component\HttpFoundation\Session\Session;

use JMS\DiExtraBundle\Annotation as DI;

/**
 * Class ActivityController
 * @Route(
 *      "/activity",
 *      name="innova_activity"
 * )
 */
class ActivityController extends Controller
{
    /**
     * @DI\InjectParams({
     *   "activityManager" = @DI\Inject("innova.manager.activity_manager"),
     * })
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     */
    public function __construct($activityManager, FormFactoryInterface $formFactory)
    {
        $this->activityManager = $activityManager;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route(
     *      "/{activityId}",
     *      name="activity_open",
     *      options={"expose" = true}
     * )
     * @Method("GET")
     * @ParamConverter("activity", class="InnovaActivityBundle:Activity", options={"mapping": {"activityId": "id"}})
     * @Template("InnovaActivityBundle:Player:main.html.twig")
     */
    public function displayAction(Activity $activity)
    {
        if (false === $this->container->get('security.context')->isGranted("OPEN", $activity->getResourceNode())){
            throw new AccessDeniedException();
        }

        return array (
            'activity' => $activity,
        );
    }

    /**
     * Create a new Activity
     * @Route(
     *      "/",
     *      name    = "innova_activity_create",
     *      options = { "expose" = true }
     * )
     * @Method("POST")
     */
    public function createAction()
    {

        /*$manager = $this->container->get('innova.manager.activity_sequence_manager');

        $om = $this->container->get('doctrine.orm.entity_manager');

        // Create the new Activity
        $activity = new Activity();

        $activity->setName('New Activity');
        $activity->setDescription('New Description');

        // Appel méthode pour ajouter +1 à la position
        $position = $manager->countActivities($activitySequence);

        $activity->setPosition($position);

        // Attach the Activity to the Sequence
        $activitySequence->addActivity($activity);

        // Save to the DB
        $om->flush();

        $activity = $this->activityManager->create($activity);
        $activityAttrs = $this->activityManager->activityAttrs($activity);

        return new JsonResponse(array (
            'id'       => $activity->getId(),
            'name'     => $activity->getName(),
            'position' => $activity->getPosition()
        ));*/
    }


    /**
     * Edit an existing activity
     * @Route(
     *      "/edit/{id}",
     *      name         = "innova_activity_editor_edit",
     *      requirements = {"id" = "\d+"},
     *      options      = {"expose" = true}
     * )
     * @Method({"GET", "PUT"})
     * @Template("InnovaActivityBundle:Editor:main.html.twig")
     */
    public function editAction(Workspace $workspace, Path $path) {
//        $this->pathManager->checkAccess('EDIT', $path);

//        return $this->renderEditor($workspace, $path, 'PUT');
    }


    /**
     * @Route(
     *      "/{activityId}",
     *      name="update_activity",
     *      options={"expose" = true}
     * )
     * @ParamConverter("activity", class="InnovaActivityBundle:Activity", options={"mapping": {"activityId": "id"}})
     * @Method("PUT")
     */
    public function updateAction(Activity $activity)
    {

        /**
         * TODO : pour plus tard quand le reste sera OK.
         * Générer le secret CSRF depuis quelque part
         * ou comme dans le PathBundle
         * // Create form to validate data
         * $form = $this->formFactory->create('innova_path_template', $pathTemplate, array (
         *     'method' => 'PUT',
         *     'csrf_protection' => false,
         *));
         * ...
         */
        $csrfSecret = '<generated token>';

        /**
         * recopie de EditController du PathBundle
         */
        $params = array();
        if (!empty($httpMethod)) {
            $params['method'] = $httpMethod;
        }
        // Create form
        $form = $this->formFactory->create('innova_path', $path, $params);

        // Try to process data
        $this->pathHandler->setForm($form);
        if ($this->pathHandler->process()) {
            // Add user message
            $this->session->getFlashBag()->add(
                'success', $this->translator->trans('path_save_success', array(), 'path_editor')
            );

            $updateAndClose = $form->get('update')->getData();

            if (!$updateAndClose) {
                // Redirect to update/editor
                $url = $this->router->generate('innova_activity_editor_edit', array(
                    'workspaceId' => $workspace->getId(),
                    'id' => $path->getId(),
                ));
            // } else {
            //     // redirect to list of paths
            //     $url = $this->router->generate('claro_workspace_open_tool', array(
            //         'workspaceid' => $workspace->getid(),
            //         'toolname' => 'innova_path',
            //     ));
            }

            // Redirect to list
            return new RedirectResponse($url);
        }
        else {
            // Redirect with JSON

        }
        return array(
            'workspace' => $workspace
        );
        /**
         * FIN recopie de EditController du PathBundle
         */

        var_dump($activity);
        $activity = $this->activityManager->create($activity);
        $activityAttrs = $this->activityManager->activityAttrs($activity);

        return new JsonResponse(array('activity' => $activityAttrs));
    }

    /**
     * @Route(
     *      "/{activityId}",
     *      name="delete_activity",
     *      options={"expose" = true}
     * )
     * @ParamConverter("activity", class="InnovaActivityBundle:Activity", options={"mapping": {"activityId": "id"}})
     * @Method("DELETE")
     */
    public function deleteAction(Activity $activity)
    {


echo "delete de l'activité";die();

        $activity = $this->activityManager->deleteActivity($activity);
        $activityAttrs = $this->activityManager->activityToJson($activity);

        return new JsonResponse(array('activity' => $activityAttrs));
    }
}
