<?php

namespace Sunhill\Home\Modules;

use Sunhill\Visual\Modules\ModuleBase;
use Sunhill\Home\Response\Camera\CameraIndexResponse;
use Sunhill\Home\Response\Camera\CameraRotateResponse;

class ModuleCameras extends ModuleBase
{
    
    protected function setupModule()
    {
        $this->setIcon('mainnav/database.png');  // Icon der Hauptseite
        $this->setName('Cameras');        // Name der Hauptseite
        $this->setDisplayName('Kameras');
        $this->setDescription('Anzeige der Außenkameras'); // Beschreibung
        $this->addSubEntry('index', CameraIndexResponse::class);
        $this->addSubEntry('Rotate', CameraRotateResponse::class)
            ->setVisible()
            ->setName('Rotate')
            ->setDisplayName(__('Rotate'));
/*        $this->addSubEntry('Objects', FeatureObjects::class)
            ->setVisible()
            ->setName('Objects')
            ->setDisplayName(__('Objects'));
        $this->addSubEntry('Tags', FeatureTags::class)
            ->setVisible()
            ->setName('Tags')
            ->setDisplayName(__('Tags')); */
    }
        
}
