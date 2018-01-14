<?php
/**
 * This file is part of Project Chaplin.
 *
 * Project Chaplin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Project Chaplin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Project Chaplin. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package   ProjectChaplin
 * @author    Dan Dart <chaplin@dandart.co.uk>
 * @copyright 2012-2018 Project Chaplin
 * @license   http://www.gnu.org/licenses/agpl-3.0.html GNU AGPL 3.0
 * @version   GIT: $Id$
 * @link      https://github.com/danwdart/projectchaplin
**/
namespace Chaplin\Module\Api\Form\Video;

use Zend_Form as Form;
use Zend_Form_Element_Submit as Submit;
use Zend_Form_SubForm as ZendSubForm;

class Name extends Form
{
    private $_ittVideos;

    public function __construct(Chaplin_Iterator_Interface $ittVideos)
    {
        $this->_ittVideos = $ittVideos;
        parent::__construct();
    }

    public function init()
    {
        $sfVideos = new ZendSubForm('Videos');
        $sfVideos->setAttribs(array('style' => 'width: 800px; margin: 0 auto;'));
        foreach($this->_ittVideos as $modelVideo) {
            $subform = new SubForm($modelVideo);
            $sfVideos->addSubForm($subform, $modelVideo->getId());
        }

        $submit = new Submit('Save');
        $submit->setAttribs(array('style' => 'clear:both; width: 140px; height: 40px;'));

        $this->addSubForm($sfVideos, 'Videos');
        $this->addElement($submit);
        $this->setAttribs(array('style' => 'width: 800px;'));
    }
}
