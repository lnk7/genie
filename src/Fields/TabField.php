<?php

namespace Lnk7\Genie\Fields;

use Lnk7\Genie\Abstracts\Field;

class TabField extends Field
{


    /**
     * Is this tab an Endpoint?
     *
     * @param bool $endpoint
     *
     * @return $this
     */
    public function endpoint(bool $endpoint)
    {
        return $this->set('endpoint', $endpoint);
    }


    protected function setDefaults()
    {
        parent::setDefaults();
        $this->type('tab');
        $this->displayOnly(true);
        $this->placement('top');
    }


    /**
     * Tab Placement
     *
     * @param string $placement
     *
     * @return $this
     */
    public function placement(string $placement)
    {
        return $this->set('placement', $placement);
    }

}