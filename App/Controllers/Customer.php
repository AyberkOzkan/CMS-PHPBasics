<?php 

namespace App\Controllers;

use Core\BaseController;

class Customer extends BaseController{
    public function Index() {
        $user = [
            'isim' => 'Ayberk',
            'soyisim' => 'Özkan',
            'yas' => 27
        ];

        $data['navbar'] = $this -> view -> load('static/navbar');
        $data['sidebar'] = $this -> view -> load('static/sidebar');
        echo $this -> view -> load('customer/index', compact('data'));
    }

    public function add() {
        $user = [
            'isim' => 'Ayberk',
            'soyisim' => 'Özkan',
            'yas' => 27
        ];

        $data['navbar'] = $this -> view -> load('static/navbar');
        $data['sidebar'] = $this -> view -> load('static/sidebar');
        echo $this -> view -> load('customer/add', compact('data'));
    }

    public function edit($id) {
        $user = [
            'isim' => 'Ayberk',
            'soyisim' => 'Özkan',
            'yas' => 27
        ];

        $data['navbar'] = $this -> view -> load('static/navbar');
        $data['sidebar'] = $this -> view -> load('static/sidebar');
        echo $this -> view -> load('customer/edit', compact('data'));
    }
}

?>