<?php
namespace AutolineAPI;

/**
 * Autoline API v1.
 *
 * TERMS OF USE:
 * - This code is in no way affiliated with, authorized, maintained, sponsored
 *   or endorsed by Autoline or any of its affiliates or subsidiaries. This is
 *   an independent and unofficial API. Use at your own risk.
 * - We do NOT support or tolerate anyone who wants to use this API to send spam
 *   or commit other online crimes.
 *
 */

class Autoline
{

	/**
	* config to all requests
	*
	* @var array
	**/
	private static $cfg = [];

	/**
	* config to all requests
	*
	* @var array
	**/
	protected $_client =[];

	/**
	* @var array
	*		   userEmail
	*		   userPassword
	*
	**/
	public function __construct(
        $data = null)
	{
		self::$cfg['userEmail']    = $data['userEmail'];
		self::$cfg['userPassword'] = $data['userPassword'];
		self::$cfg['UserId'] = $data['userId'];
		$this->_client = new \SoapClient('http://api.autoline.com.br/integradoras.asmx?wsdl');
    }

	/**
	* 
	* Get kind exchanges car
	*
	* @return array 	
	*
	**/
    public function getExchange()
	{
		try{
            $response = $this->_client->ConsultarCambios(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}


	/**
	* 
	* Get categories
	*
	* @return array 	
	*
	**/
    public function getCategories()
	{	
		try{
            $response = $this->_client->ConsultarCategorias(array_merge(self::$cfg, ['segment'=>'Car']));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get fuel types used in Autoline register
	*
	* @param string $params
	*					modelId
	*
	* @return array 	
	*
	**/
    public function getYearModel($params)
	{
		try{
            $response = $this->_client->ConsultarAnosModelo(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }

	}

	/**
	* 
	* Get Uf's in Brazil
	*
	* @param string $params
	*					stateId
	*
	* @return array 	
	*
	**/
    public function getStates()
	{
		try{
            $response = $this->_client->ConsultarUFs(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }

	}

	/**
	* 
	* Get cities by id state
	*
	* @param string $params
	*					stateId
	*
	* @return array 	
	*
	**/
    public function getCities($params)
	{
		try{
            $response = $this->_client->ConsultarCidades(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }

	}

	/**
	* 
	* Get makes used in Autoline register
	*
	* @return array 	
	*
	**/
    public function getMaker()
	{	
		try{
            $response = $this->_client->ConsultarMarcas(array_merge(self::$cfg, ['segment'=>'Car']));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get models by maker
	*
	* @param string $params
	*					makeId
	*
	* @return array 	
	*
	**/
    public function getModels($params)
	{	
		try{
            $response = $this->_client->ConsultarModelos(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get version models by model
	*
	* @param string $params
	*					modelYearId
	*
	* @return array 	
	*
	**/
    public function getVersionModels($params)
	{	
		try{
            $response = $this->_client->ConsultarVersoesModelo(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get marching number
	*
	*
	* @return array 	
	*
	**/
    public function getMarchingNumber()
	{	
		try{
            $response = $this->_client->ConsultarNrosMarcha(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get doors number
	*
	*
	* @return array 	
	*
	**/
    public function getDoorsNumber()
	{	
		try{
            $response = $this->_client->ConsultarNroPortas(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get car options used in Autoline
	*
	* @return array 	
	*
	**/
    public function getOptions()
	{	
		try{
            $response = $this->_client->ConsultarOpcionais(array_merge(self::$cfg, ['segment'=>'Car']));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get car colors
	*
	*
	* @return array 	
	*
	**/
    public function getColors()
	{	
		try{
            $response = $this->_client->ConsultarCores(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get power supply
	*
	*
	* @return array 	
	*
	**/
    public function getPowerSupply()
	{	
		try{
            $response = $this->_client->ConsultarTiposAlimentacao(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get brakes 
	*
	*
	* @return array 	
	*
	**/
    public function getBrakes()
	{	
		try{
            $response = $this->_client->ConsultarTiposFreio(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get motor types
	*
	*
	* @return array 	
	*
	**/
    public function getMotorTypes()
	{	
		try{
            $response = $this->_client->ConsultarTiposMotor(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get car departure
	*
	*
	* @return array 	
	*
	**/
    public function getCarDeparture()
	{	
		try{
            $response = $this->_client->ConsultarTiposPartida(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get fuel types
	*
	*
	* @return array 	
	*
	**/
    public function getFuelTypes()
	{	
		try{
            $response = $this->_client->ConsultarCombustiveis(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get refrigeration
	*
	*
	* @return array 	
	*
	**/
    public function getRegrigeration()
	{	
		try{
            $response = $this->_client->ConsultarTiposRefrigeracao(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get plans
	*
	*
	* @return array 	
	*
	**/
    public function getAcquiredPlans()
	{	
		try{
            $response = $this->_client->ConsultarPlanosAdquiridos(array_merge(self::$cfg, ['segment'=>'Car']));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get reasons cancel ad
	*
	*
	* @return array 	
	*
	**/
    public function getReasonsCancelAd()
	{	
		try{
            $response = $this->_client->ConsultarMotivosCancelamentoAnuncio(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get ads list
	*
	*
	* @return array 	
	*
	**/
    public function getAllAds()
	{	
		try{
            $response = $this->_client->ConsultarAnuncios(self::$cfg);
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get get ad by id
	*
	* @param string $params
	*					AdId
	*
	* @return array 	
	*
	**/
    public function getAd($params)
	{	
		try{
            $response = $this->_client->ConsultarAnuncio(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Get pictures in ad
	*
	* @param string $params
	*					adId
	*
	*
	* @return array 	
	*
	**/
    public function getAdPictures($params)
	{	
		try{
            $response = $this->_client->ConsultarFotos(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Create a new ad in the inventory
	* 
	* @var array 
	*			'AdPlanSubscriptionId'                  
	*			'IsFeatured'                          
	*			'CityId'                                
	*			'IsZeroKm'                            
	*			'ModelYear'                           
	*			'BuiltYear'                         
	*			'RegistrationPlate'                     
	*			'Price'                                 
	*			'Odometer'                              
	*			'FuelTypeId'                    
	*			'IsOneOwnerUsed'                   
	*			'IsRegistrationPaid'                   
	*			'IsTaxPaid'                           
	*			'IsSwapNotAccepted'                     
	*			'IsFinanced'                          
	*			'Features'                              
	*			'AdditionalInformation'              
	*			'ModelId'                        
	*			'IsArmored'                             
	*			'IsDisabilityAdapted'                 
	*			'IsCollectorVehicle'                
	*			'ZipCode'                              
	*			'AreAllServicesMadeByAuthorizedCenters'
	*			'IsManufacturerWarrantyActive'         
	*			'BodyTypeId'                          
	*			'TransmissionId'                   
	*			'DoorNumberId'                     
	*			'ColorId'                             
	*			'ClientOriginId'                    
	*			'ModelVersionId'                   
	*			'OperatorCode'                        
	*			'MakeId'   
	*
	* @return array 	
	*
	**/
    public function postAd($params)
	{	
		try{
			$params['model'] = array_merge(['UserId' => self::$cfg['UserId'], 'AdId' => 0], $params['model']);
            $response = $this->_client->IncluirAnuncioCarro(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* Create a new picture in ad
	* 
	* @var array 
	*			'adId'                   
	*
	* @return array 	
	*
	**/
	public function postPicture($params){
		try{
				unset(self::$cfg['UserId']);
				$response = $this->_client->InserirFotos(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* cancel ad by id and id reason (getReasonsCancelAd)
	* 
	* @var array 
	*			'idAnuncio'      
	*			'idMotivo'             
	*
	* @return array 	
	*
	**/
	public function deleteAd($params){
		try{
				unset(self::$cfg['UserId']);
				$response = $this->_client->CancelarAnuncio(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

	/**
	* 
	* delete a picture in ad in the inventory
	* 
	* @var array 
	*			'adId'      
	*			'adImageId'             
	*
	* @return array 	
	*
	**/
	public function deletePicture($params){
		try{
				unset(self::$cfg['UserId']);
				$response = $this->_client->CancelarAnun(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}

		/**
	* 
	* update a ad in the inventory
	* 
	* @var array 
	*			'idAnuncio'
	*			'AdPublishStatusId'
	*			'AdPlanSubscriptionId'
	*			'EnableField'                 
	*			'IsFeatured'                          
	*			'CityId'                                
	*			'IsZeroKm'                            
	*			'ModelYear'                           
	*			'BuiltYear'                         
	*			'RegistrationPlate'                     
	*			'Price'                                 
	*			'Odometer'                              
	*			'FuelTypeId'                    
	*			'IsOneOwnerUsed'                   
	*			'IsRegistrationPaid'                   
	*			'IsTaxPaid'                           
	*			'IsSwapNotAccepted'                     
	*			'IsFinanced'                          
	*			'Features'                              
	*			'AdditionalInformation'              
	*			'ModelId'                        
	*			'IsArmored'                             
	*			'IsDisabilityAdapted'                 
	*			'IsCollectorVehicle'                
	*			'ZipCode'                              
	*			'AreAllServicesMadeByAuthorizedCenters'
	*			'IsManufacturerWarrantyActive'         
	*			'BodyTypeId'                          
	*			'TransmissionId'                   
	*			'DoorNumberId'                     
	*			'ColorId'                             
	*			'ClientOriginId'                    
	*			'ModelVersionId'                   
	*			'OperatorCode'                        
	*			'MakeId'   
	*
	* @return array 	
	*
	**/
    public function putAd($params)
	{	
		try{
			$params['model'] = array_merge(['UserId' => self::$cfg['UserId'], 'AdId' => 0, 'idAnuncio'=>$params['idAnuncio']], $params['model']);
            $response = $this->_client->AlterarAnuncioCarro(array_merge(self::$cfg, $params));
            return [
				'status' => 'ok',
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            return [
                'status' => 'fail',
                'body' => $e->getMessage()
            ];
        }
	}
}