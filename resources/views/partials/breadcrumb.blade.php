<!-- ##### Breadcrumb Area Start ##### -->

@php
    $b = $banner ?? 'bg-img/23.jpg';
@endphp

<div class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/' . $b) }} );">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <!-- Breadcrumb Text -->
            <div class="col-12">
                <div class="breadcrumb-text">
                    <h2>{{ $breadcrumb ?? "" }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
