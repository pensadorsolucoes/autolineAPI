<?php

//======================================================================
// Constructor
//======================================================================
use AutolineAPI\Autoline as autoline;
require('vendor/autoload.php');

$auto = new autoline(
   array(
      'userEmail'    => '{user email}',
      'userPassword' => '{user password}',
      'userId'       => {user id}
      )
   );

//======================================================================
// Some gets
//======================================================================
$states = $auto->getStates();

$params = ['stateId' => {id}];
$cyties = $auto->getCities($params);

$makers = $auto->getMaker();

$params = ['makeId'=> {id}];
$models = $auto->getModels($params);

$fuel = $auto->getFuelKind();

$color = $auto->getColors();

$exc = $auto->getExchange();

$plan = $auto->getAcquiredPlans();

$params = ['modelId' => {id}];
$modelYear = $auto->getYearModel($params);

$params = ['modelYearId'=>{id}];
$version = $auto->getVersionModels($params);

$options = $auto->getOptions();

$params=['adId'=>'{id}'];
$photos = $auto->getAdPictures($params);

$params=['AdId'=>'{id}'];
$ad = $auto->getAd($params);


//======================================================================
//Posts
//======================================================================
$params=[
   'model' =>[
      'AdPlanSubscriptionId'                  => 49364,
      'IsFeatured'                            => 1, //se o anúncio será publicado com destaoque ou não  
      'CityId'                                => 977,
      'IsZeroKm'                              => 1,
      'ModelYear'                             => 2017,
      'BuiltYear'                             => 2017,
      'RegistrationPlate'                     => 'OBD1238',
      'Price'                                 => 38987.69,
      'Odometer'                              => 0,
      'FuelTypeId'                            => 5,
      'IsOneOwnerUsed'                        => 1, // único dono?
      'IsRegistrationPaid'                    => 1,
      'IsTaxPaid'                             => 1,
      'IsSwapNotAccepted'                     => 0,
      'IsFinanced'                            => 0,
      'Features'                              => [31,49,2,28],
      'AdditionalInformation'                 => 'teste sfa fsdfasfa', //observaçõe extras do vendedor
      'ModelId'                               => 353,
      'IsArmored'                             => 0, //Se o veículo for blindado
      'IsDisabilityAdapted'                   => 0, //Se o veículo for adaptados para deficientes físicos.
      'IsCollectorVehicle'                    => 0, //de coleção
      'ZipCode'                               => '74650400', //cep da loja
      'AreAllServicesMadeByAuthorizedCenters' => 1, //se revisões foram feitas na concessionária
      'IsManufacturerWarrantyActive'          => 1, //se o veículo possui garantia
      'BodyTypeId'                            => 4,
      'TransmissionId'                        => 4,
      'DoorNumberId'                          => 4,
      'ColorId'                               => 8,
      'ClientOriginId'                        => 3, 
      'ModelVersionId'                        => 22225,
      'OperatorCode'                          => 10,
      'MakeId'                                => 140
   ]
];
$postAd = $auto->postAd($params);

//======================================================================
//Update
//======================================================================
// $params=[
   'idAnuncio'=> '3428467',
   'model' =>[
      'AdPublishStatusId'                     => 1,
      'EnableField'                           => 1,
      'ModerationStatusId'                    => 4,
      'AdPlanSubscriptionId'                  => 49364,
      'IsFeatured'                            => 1, //se o anúncio será publicado com destaoque ou não  
      'CityId'                                => 977,
      'IsZeroKm'                              => 1,
      'ModelYear'                             => 2017,
      'BuiltYear'                             => 2017,
      'RegistrationPlate'                     => 'OBD1238',
      'Price'                                 => 38987.69,
      'Odometer'                              => 0,
      'FuelTypeId'                            => 5,
      'IsOneOwnerUsed'                        => 1, // único dono?
      'IsRegistrationPaid'                    => 1,
      'IsTaxPaid'                             => 1,
      'IsSwapNotAccepted'                     => 0,
      'IsFinanced'                            => 0,
      'Features'                              => [31,49,2,28],
      'AdditionalInformation'                 => 'teste sfa fsdfasfa alguma alteração', //observaçõe extras do vendedor
      'ModelId'                               => 353,
      'IsArmored'                             => 0, //Se o veículo for blindado
      'IsDisabilityAdapted'                   => 0, //Se o veículo for adaptados para deficientes físicos.
      'IsCollectorVehicle'                    => 0, //de coleção
      'ZipCode'                               => '74650400', //cep da loja
      'AreAllServicesMadeByAuthorizedCenters' => 1, //se revisões foram feitas na concessionária
      'IsManufacturerWarrantyActive'          => 1, //se o veículo possui garantia
      'BodyTypeId'                            => 4,
      'TransmissionId'                        => 4,
      'DoorNumberId'                          => 4,
      'ColorId'                               => 8,
      'ClientOriginId'                        => 3, 
      'ModelVersionId'                        => 22225,
      'OperatorCode'                          => 10,
      'MakeId'                                => 140
   ]
];

$teste = $auto->putAd($params);