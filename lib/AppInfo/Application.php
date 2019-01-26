<?php
/**
 * Nextcloud - Tasks
 *
 * @author Raimund Schlüßler
 * @copyright 2019 Raimund Schlüßler <raimund.schluessler@mailbox.org>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Tasks\AppInfo;

use OCP\AppFramework\App;

class Application extends App {

	/**
	 * @param array $params
	 */
	public function __construct(array $params=[]) {
		parent::__construct('tasks', $params);
	}

	/**
	 * Register navigation
	 */
	public function registerNavigation() {
		$appName = $this->getContainer()->getAppName();
		$server = $this->getContainer()->getServer();
		$urlGenerator = $server->getURLGenerator();

		$server->getNavigationManager()->add(function() use ($appName, $server, $urlGenerator) {
			return [
				'id' => $appName,

				'order' => 100,

				'href' => $urlGenerator->linkToRoute('tasks.page.index'),

				'icon' => $urlGenerator->imagePath($appName, 'tasks.svg'),

				'name' => $server->getL10N($appName)->t('Tasks'),
			];
		});
	}
}
