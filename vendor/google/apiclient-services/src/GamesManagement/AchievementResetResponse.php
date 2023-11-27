<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\GamesManagement;

class AchievementResetResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $currentState;
  /**
   * @var string
   */
  public $definitionId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $updateOccurred;

  /**
   * @param string
   */
  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }
  /**
   * @return string
   */
  public function getCurrentState()
  {
    return $this->currentState;
  }
  /**
   * @param string
   */
  public function setDefinitionId($definitionId)
  {
    $this->definitionId = $definitionId;
  }
  /**
   * @return string
   */
  public function getDefinitionId()
  {
    return $this->definitionId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param bool
   */
  public function setUpdateOccurred($updateOccurred)
  {
    $this->updateOccurred = $updateOccurred;
  }
  /**
   * @return bool
   */
  public function getUpdateOccurred()
  {
    return $this->updateOccurred;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AchievementResetResponse::class, 'Google_Service_GamesManagement_AchievementResetResponse');
