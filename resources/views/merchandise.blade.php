@extends('layouts.main')

@section('Merchandise')

<section>
<div class="merch-container">
    <div class="merch-header">
        <h1>Merchandise</h1>
    </div>
    <div class="merch-wrapper">
        <div class="merch-items-grid">
            <a href="#preorder" class="merch-item"><img src="assets/img/bg/bg1.jpg" alt="merchandise"></a>
            <a href="#preorder" class="merch-item"><img src="assets/img/bg/bg1.jpg" alt="merchandise"></a>
            <a href="#preorder" class="merch-item"><img src="assets/img/bg/bg1.jpg" alt="merchandise"></a>
        </div>
        <div class="merch-btn-wrapper" id="preorder">
            <a href="/" class="merch-btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Pre-Order Now!</a>
        </div>
    </div>
</div>
</section>

@endsection
