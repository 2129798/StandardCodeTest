<?php
namespace VG\StandardCodeTestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TabViewController extends Controller
{
    /**
     * @Route("/", name="varnish_log")
     */
    public function varnishAction() {
        $varnishLogService = $this->get('standard_code_test.varnishlog');
        return $this->render(
            'StandardCodeTestBundle:Tabs:varnish.html.twig',
            array(
                'hosts' => $varnishLogService->getTopHosts(5),
                'downloads' => $varnishLogService->getTopDownloaded(5)
            )
        );
    }
    /**
     * @Route("/rss", name="rss_list")
     */
    public function rssAction() {
        return $this->render(
            'StandardCodeTestBundle:Tabs:rss.html.twig',
            array(
                'items' => $this->get('standard_code_test.dataservice')->call( $this->getParameter('rss_url') )
            )
        );
    }
    /**
     * @Route("/json", name="json_list")
     */
    public function jsonAction() {
        return $this->render(
            'StandardCodeTestBundle:Tabs:json.html.twig',
            array(
                'items' => $this->get('standard_code_test.dataservice')->call( $this->getParameter('json_url') )
            )
        );
    }
}