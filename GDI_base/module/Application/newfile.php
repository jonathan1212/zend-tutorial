<?php
return array (
		'router' => array (
				'routes' => array (
						'news' => array (
								'type' => 'literal',
								'options' => array (
										'route' => '/news',
										'defaults' => array (
												'controller' => 'NewsController',
												'action' => 'showAll' 
										) 
								),
								// Defines that "/news" can be matched on its own without a child route being matched
								'may_terminate' => true,
								'child_routes' => array (
										'archive' => array (
												'type' => 'segment',
												'options' => array (
														'route' => '/archive[/:year]',
														'defaults' => array (
																'action' => 'archive' 
														),
														'constraints' => array (
																'year' => '\d{4}' 
														) 
												) 
										),
										'single' => array (
												'type' => 'segment',
												'options' => array (
														'route' => '/:id',
														'defaults' => array (
																'action' => 'detail' 
														),
														'constraints' => array (
																'id' => '\d+' 
														) 
												) 
										) 
								) 
						) 
				) 
		) 
);