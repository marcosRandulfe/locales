<?php

 class Local{
        private $name;
        private $address;
        private $opening_hours;
        private $take_away;
        private $deliverys;
        private $restaurant_menu;
        private $whatsapp;
        private $phones;
        private $web;
        private $email;
        private $url_foto;
        private $validado;
        
        function __construct($name, $address, $opening_hours, $take_away, $deliverys, $restaurant_menu, $whatsapp,$phones, $web, $email, $url_foto, $validado) {
            $this->name = $name;
            $this->address = $address;
            $this->opening_hours = $opening_hours;
            $this->take_away = $take_away;
            $this->deliverys = $deliverys;
            $this->restaurant_menu = $restaurant_menu;
            $this->whatsapp = $whatsapp;
            $this->phones= $phones;
            $this->web = $web;
            $this->email = $email;
            $this->url_foto = $url_foto;
            $this->validado = $validado;
        }

        
        function getName() {
            return $this->name;
        }

        function getAddress() {
            return $this->address;
        }

        function getOpening_hours() {
            return $this->opening_hours;
        }

        function getTake_away() {
            return $this->take_away;
        }

        function getDeliverys() {
            return $this->deliverys;
        }

        function getRestaurant_menu() {
            return $this->restaurant_menu;
        }

        function getWhatsapp() {
            return $this->whatsapp;
        }

        function getPhones() {
            return $this->phones;
        }

        function getWeb() {
            return $this->web;
        }

        function getEmail() {
            return $this->email;
        }

        function getUrl_foto() {
            return $this->url_foto;
        }

        function getValidado() {
            return $this->validado;
        }

        function setName($name): void {
            $this->name = $name;
        }

        function setAddress($address): void {
            $this->address = $address;
        }

        function setOpening_hours($opening_hours): void {
            $this->opening_hours = $opening_hours;
        }

        function setTake_away($take_away): void {
            $this->take_away = $take_away;
        }

        function setDeliverys($deliverys): void {
            $this->deliverys = $deliverys;
        }

        function setRestaurant_menu($restaurant_menu): void {
            $this->restaurant_menu = $restaurant_menu;
        }

        function setWhatsapp($whatsapp): void {
            $this->whatsapp = $whatsapp;
        }

        function setPhones($phones): void {
            $this->phones = $phones;
        }

        function setWeb($web): void {
            $this->web = $web;
        }

        function setEmail($email): void {
            $this->email = $email;
        }

        function setUrl_foto($url_foto): void {
            $this->url_foto = $url_foto;
        }

        function setValidado($validado): void {
            $this->validado = $validado;
        }    
        
        function addPhone($phone){
            $this->phones[]=$phone;
        }

    }
