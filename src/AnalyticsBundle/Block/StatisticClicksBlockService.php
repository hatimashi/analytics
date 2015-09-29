<?php

namespace AnalyticsBundle\Block;

use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StatisticClicksBlockService extends BaseBlockService {

    /**
     * @param string          $name
     * @param EngineInterface $templating
     */
    public function __construct($name, $templating) {
        parent::__construct($name, $templating);

        $this->templating = $templating;
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'content' => 'My content',
            'template' => 'AnalyticsBundle:Block:statistic_block.html.twig'
        ));
    }

//    public function buildEditForm(FormMapper $formMapper, BlockInterface $block) {
//        $formMapper->add('settings', 'sonata_type_immutable_array', array(
//            'keys' => array(
//                array('content', 'textarea', array()),
//            )
//        ));
//    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null) {
        $settings = $blockContext->getSettings();
        return $this->renderResponse($blockContext->getTemplate(), array(
                    'settings' => $settings,
                    'block' => $blockContext->getBlock(),
                        ), $response);
    }

}
