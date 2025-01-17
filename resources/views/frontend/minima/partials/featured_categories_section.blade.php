@php
$categories = [
    8 => 'Best Seller',
    2 => 'Bracelets',
    3 => 'Earrings',
];
@endphp

@if (count(get_category_selected_products(array_keys($categories))) > 0)
<section class="pt-md-5 pt-4 pb-3 product_category_tabs">
    <div class="container">
        <div class="text-center">
            <h3 class="main_heading text_clr_green pb-md-3 pb-0">Browse By Categories</h3>
        </div>
        <ul class="nav nav-pills mb-md-3 justify-content-center listing_tabs" id="pills-tab" role="tablist">
            @foreach ($categories as $categoryId => $categoryName)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                        id="pills-category-{{ $categoryId }}-tab"
                        data-toggle="pill"
                        data-target="#pills-category-{{ $categoryId }}"
                        type="button"
                        role="tab"
                        aria-controls="pills-category-{{ $categoryId }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $categoryName }}
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($categories as $categoryId => $categoryName)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="pills-category-{{ $categoryId }}"
                    role="tabpanel"
                    aria-labelledby="pills-category-{{ $categoryId }}-tab">
                    <!-- Products Section -->
                    <div class="px-sm-3">
                        <div class="aiz-carousel sm-gutters-15 arrow-none" data-items="4" data-xl-items="4"
                            data-lg-items="4" data-md-items="4" data-sm-items="2" data-xs-items="2"
                            data-arrows='true' data-infinite='false'>
                            @foreach (get_category_selected_products([$categoryId]) as $key => $product)
                                <div class="carousel-box position-relative px-0 has-transition">
                                    <div class="px-md-3 px-2">
                                        @include(
                                            'frontend.' . get_setting('homepage_select') . '.partials.product_box_1',
                                            ['product' => $product]
                                        )
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
