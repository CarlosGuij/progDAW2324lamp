<?php

class Empresa {
	public string $id;
	public string $company;
	public string $investment;
	public string $date;
	public string $active;

	public function __construct($id, $company, $investment, $date, $active){
		$this->id = $id;
		$this->company = $company;
		$this->investment = $investment;
		$this->date = $date;
		$this->active = $active;
    }
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setCompany($company)
	{
		$this->company = $company;
	}
	public function setInvestment($investment)
	{
		$this->investment = $investment;
	}
	public function setDate($date)
	{
		$this->date = $date;
	}
	public function setActive($active)
	{
		$this->active = $active;
	}

    public function getId(){
        return $this->id;
    }
	public function getCompany(){
        return $this->company;
    }
	public function getInvestment(){
        return $this->investment;
    }
	public function getDate(){
        return $this->date;
    }
	public function getActive(){
        return $this->active;
    }
		
}
?>