<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Ortho Direction | Expert Dental Care</title>

    <meta name="description"
        content="Ortho Direction - Comprehensive dental services with expert care. Learn more about our services, pricing, and team.">
    <meta name="keywords" content="dentist, dental care, dental services, ortho direction">
    <meta name="author" content="Ortho Direction">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Ortho Direction | Expert Dental Care">
    <meta property="og:description" content="Comprehensive dental services with expert care.">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:url" content="https://www.orthodirection.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ortho Direction | Expert Dental Care">
    <meta name="twitter:description" content="Comprehensive dental services with expert care.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">


    {{-- @vite(['resources/js/app.js']) --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="preload" href="{{ asset('assets/dashboard_ui/assets/css/style2888.css?v1.0.0') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/dashboard_ui/assets/css/style2888.css?v1.0.0') }}">
</head>

<body class="nk-body">

    <div class="nk-app-root " data-sidebar-collapse="lg">
        <div class="nk-main">
            <div class="nk-wrap">
                <div class="d-flex flex-wrap flex-grow-1">
                    <div
                        class="bg-lighter w-100 w-lg-50 d-flex align-items-center justify-content-center justify-content-lg-end p-4 p-sm-5">
                        <div class="wide-xs w-100">
                            <div class="d-flex"><a class="pe-2 d-flex align-items-center" href="/pricing"><em
                                        class="icon ni ni-arrow-left text-light"></em></a><a href="/"
                                    class="logo-link">
                                    <div class="logo-wrap" style="height: 60px;"><img class="logo-img logo-light" src="{{asset('assets/images/logo.png')}}"
                                            alt=""><img class="logo-img logo-dark" src="{{asset('assets/images/logo.png')}}"
                                            alt=""><img class="logo-img logo-icon" src="{{asset('assets/images/favicon.png')}}"
                                            alt=""></div>
                                </a></div>
                            <div class="pt-4">
                                <div class="fs-4 fw-normal">Subscribe to Unlimited (Yearly)</div>
                                <h3 class="display-1 fw-semibold">$225 <span class="caption-text text-light fw-normal">
                                        per year</span></h3>
                                <div class="fs-5 fw-normal mt-2">A yearly pro plan for genious</div>
                            </div>
                            <ul class="mt-4 gap gy-4 pb-2">
                                <li class="d-flex justify-content-between">
                                    <div class="">
                                        <div class="caption-text">Unlimited (Yearly)</div><span class="sub-text">Qty
                                            1Billed yearly</span>
                                    </div>
                                    <div class="caption-text">$225.00</div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div class="">
                                        <div class="caption-text">Subtotal</div>
                                    </div>
                                    <div class="caption-text">$225.00</div>
                                </li>
                            </ul>
                            <div class="border-top border-bottom py-3"><button class="btn btn-light btn-md"> Add
                                    promotion code </button></div>
                            <div class="d-flex justify-content-between pt-2 pb-lg-5 mb-lg-5">
                                <div class="caption-text">Total</div>
                                <div class="caption-text">$225.00</div>
                            </div>
                            <div class="pt-lg-5"></div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between mt-5 pt-lg-5">
                                <div class="text-light fs-14px">Powered By Stripe</div>
                                <ul class="nav nav-sm mx-n1">
                                    <li class="nav-item"><a class="nav-link px-1" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link px-1" href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white w-100 w-lg-50 d-flex align-items-center justify-content-center justify-content-lg-start p-4 p-sm-5">
                        <div class="wide-xs w-100">
                            <h2 class="mb-3 fw-normal">Pay with card</h2>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group"><label class="form-label" for="email">Email</label>
                                        <div class="form-control-wrap"><input class="form-control" type="email"
                                                id="email" placeholder="Enter email address"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label class="form-label" for="card-number">Card
                                            information</label>
                                        <div class="form-control-wrap">
                                            <div class="d-flex flex-wrap border border-light rounded">
                                                <div
                                                    class="w-100 border-bottom border-light d-flex align-items-center">
                                                    <input class="form-control-plaintext px-3" type="text"
                                                        id="card-number" placeholder="1234 1234 1234 1234">
                                                    <ul class="d-flex pe-3 gap gx-1 flex-shrink-0">
                                                        <li class="h-1rem d-inline-flex"><img
                                                                src="{{ asset('assets/dashboard_ui/images/icons/card/visa.png')}}" alt=""
                                                                class="h-100"></li>
                                                        <li class="h-1rem d-inline-flex"><img
                                                                src="{{ asset('assets/dashboard_ui/images/icons/card/mastercard.png')}}" alt=""
                                                                class="h-100"></li>
                                                        <li class="h-1rem d-inline-flex"><img
                                                                src="{{ asset('assets/dashboard_ui/images/icons/card/amex.png')}}" alt=""
                                                                class="h-100"></li>
                                                        <li class="h-1rem d-inline-flex"><img
                                                                src="{{ asset('assets/dashboard_ui/images/icons/card/diners.png')}}" alt=""
                                                                class="h-100"></li>
                                                    </ul>
                                                </div>
                                                <div class="w-50 border-end border-light"><input
                                                        class="form-control-plaintext px-3 js-datepicker datepicker-input"
                                                        type="text" id="card-exp-date" data-format="mm/yy"
                                                        data-start-view="2" data-max-view="2" data-pick-level="1"
                                                        placeholder="MM/YY">
                                                    <div class="datepicker datepicker-dropdown datepicker-orient-left datepicker-orient-top"
                                                        style="left: 1px; top: -238px;">
                                                        <div class="datepicker-picker">
                                                            <div class="datepicker-header">
                                                                <div class="datepicker-title" style="display: none;">
                                                                </div>
                                                                <div class="datepicker-controls"><button
                                                                        type="button"
                                                                        class="btn btn-md prev-button prev-btn"
                                                                        tabindex="-1">«</button><button
                                                                        type="button" class="btn btn-md view-switch"
                                                                        tabindex="-1">2020-2029</button><button
                                                                        type="button"
                                                                        class="btn btn-md next-button next-btn"
                                                                        tabindex="-1">»</button></div>
                                                            </div>
                                                            <div class="datepicker-main">
                                                                <div class="datepicker-view years datepicker-grid">
                                                                    <span data-year="2019"
                                                                        class="datepicker-cell year prev">2019</span><span
                                                                        data-year="2020"
                                                                        class="datepicker-cell year">2020</span><span
                                                                        data-year="2021"
                                                                        class="datepicker-cell year">2021</span><span
                                                                        data-year="2022"
                                                                        class="datepicker-cell year">2022</span><span
                                                                        data-year="2023"
                                                                        class="datepicker-cell year">2023</span><span
                                                                        data-year="2024"
                                                                        class="datepicker-cell year">2024</span><span
                                                                        data-year="2025"
                                                                        class="datepicker-cell year focused">2025</span><span
                                                                        data-year="2026"
                                                                        class="datepicker-cell year">2026</span><span
                                                                        data-year="2027"
                                                                        class="datepicker-cell year">2027</span><span
                                                                        data-year="2028"
                                                                        class="datepicker-cell year">2028</span><span
                                                                        data-year="2029"
                                                                        class="datepicker-cell year">2029</span><span
                                                                        data-year="2030"
                                                                        class="datepicker-cell year next">2030</span>
                                                                </div>
                                                            </div>
                                                            <div class="datepicker-footer">
                                                                <div class="datepicker-controls"><button
                                                                        type="button"
                                                                        class="btn btn-md today-button today-btn"
                                                                        tabindex="-1"
                                                                        style="display: none;">Today</button><button
                                                                        type="button"
                                                                        class="btn btn-md clear-button clear-btn"
                                                                        tabindex="-1"
                                                                        style="display: none;">Clear</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-50"><input class="form-control-plaintext px-3"
                                                        type="text" id="card-ccv" placeholder="123"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label class="form-label" for="name">Name on
                                            card</label>
                                        <div class="form-control-wrap"><input class="form-control" type="text"
                                                id="name" placeholder="Full Name"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label class="form-label">Country</label>
                                        <div class="form-control-wrap">
                                            {{-- <select name="" id="" class="js-select choices__input">
                                                <option value="" selected>Pakistan</option>
                                                <option value="">sample</option>
                                                <option value="">sample</option>
                                                <option value="">sample</option>
                                                <option value="">sample</option>
                                            </select> --}}
                                            <div class="choices" data-type="select-one" tabindex="0"
                                                role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                                aria-expanded="false">
                                                <div class="choices__inner"><select class="js-select choices__input"
                                                        data-search="true" data-sort="false" hidden=""
                                                        tabindex="-1" data-choice="active">
                                                        <option value="AF"
                                                            data-custom-properties="[object Object]">Afghanistan
                                                        </option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__item--selectable"
                                                            data-item="" data-id="1" data-value="AF"
                                                            data-custom-properties="[object Object]"
                                                            aria-selected="true" data-deletable="">Afghanistan<button
                                                                type="button" class="choices__button"
                                                                aria-label="Remove item: 'AF'" data-button="">Remove
                                                                item</button></div>
                                                    </div>
                                                </div>
                                                <div class="choices__list choices__list--dropdown"
                                                    aria-expanded="false"><input type="search" name="search_terms"
                                                        class="choices__input choices__input--cloned"
                                                        autocomplete="off" autocapitalize="off" spellcheck="false"
                                                        role="textbox" aria-autocomplete="list" aria-label="null"
                                                        placeholder="Search"
                                                        aria-activedescendant="choices--u48b-item-choice-83">
                                                    <div class="choices__list" role="listbox">
                                                        <div id="choices--u48b-item-choice-1"
                                                            class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                            role="option" data-choice="" data-id="1"
                                                            data-value="AF" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">
                                                            Afghanistan</div>
                                                        <div id="choices--u48b-item-choice-2"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="2"
                                                            data-value="AX" data-select-text=""
                                                            data-choice-selectable="">Åland Islands</div>
                                                        <div id="choices--u48b-item-choice-3"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="3"
                                                            data-value="AL" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Albania
                                                        </div>
                                                        <div id="choices--u48b-item-choice-4"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="4"
                                                            data-value="DZ" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Algeria
                                                        </div>
                                                        <div id="choices--u48b-item-choice-5"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="5"
                                                            data-value="AS" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">American
                                                            Samoa</div>
                                                        <div id="choices--u48b-item-choice-6"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="6"
                                                            data-value="AD" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">AndorrA
                                                        </div>
                                                        <div id="choices--u48b-item-choice-7"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="7"
                                                            data-value="AO" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Angola
                                                        </div>
                                                        <div id="choices--u48b-item-choice-8"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="8"
                                                            data-value="AI" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Anguilla
                                                        </div>
                                                        <div id="choices--u48b-item-choice-9"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="9"
                                                            data-value="AQ" data-select-text=""
                                                            data-choice-selectable="">Antarctica</div>
                                                        <div id="choices--u48b-item-choice-10"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="10"
                                                            data-value="AG" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Antigua
                                                            and Barbuda</div>
                                                        <div id="choices--u48b-item-choice-11"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="11"
                                                            data-value="AR" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Argentina
                                                        </div>
                                                        <div id="choices--u48b-item-choice-12"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="12"
                                                            data-value="AM" data-select-text=""
                                                            data-choice-selectable="">Armenia</div>
                                                        <div id="choices--u48b-item-choice-13"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="13"
                                                            data-value="AW" data-select-text=""
                                                            data-choice-selectable="">Aruba</div>
                                                        <div id="choices--u48b-item-choice-14"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="14"
                                                            data-value="AU" data-select-text=""
                                                            data-choice-selectable="">Australia</div>
                                                        <div id="choices--u48b-item-choice-15"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="15"
                                                            data-value="AT" data-select-text=""
                                                            data-choice-selectable="">Austria</div>
                                                        <div id="choices--u48b-item-choice-16"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="16"
                                                            data-value="AZ" data-select-text=""
                                                            data-choice-selectable="">Azerbaijan</div>
                                                        <div id="choices--u48b-item-choice-17"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="17"
                                                            data-value="BS" data-select-text=""
                                                            data-choice-selectable="">Bahamas</div>
                                                        <div id="choices--u48b-item-choice-18"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="18"
                                                            data-value="BH" data-select-text=""
                                                            data-choice-selectable="">Bahrain</div>
                                                        <div id="choices--u48b-item-choice-19"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="19"
                                                            data-value="BD" data-select-text=""
                                                            data-choice-selectable="">Bangladesh</div>
                                                        <div id="choices--u48b-item-choice-20"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="20"
                                                            data-value="BB" data-select-text=""
                                                            data-choice-selectable="">Barbados</div>
                                                        <div id="choices--u48b-item-choice-21"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="21"
                                                            data-value="BY" data-select-text=""
                                                            data-choice-selectable="">Belarus</div>
                                                        <div id="choices--u48b-item-choice-22"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="22"
                                                            data-value="BE" data-select-text=""
                                                            data-choice-selectable="">Belgium</div>
                                                        <div id="choices--u48b-item-choice-23"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="23"
                                                            data-value="BZ" data-select-text=""
                                                            data-choice-selectable="">Belize</div>
                                                        <div id="choices--u48b-item-choice-24"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="24"
                                                            data-value="BJ" data-select-text=""
                                                            data-choice-selectable="">Benin</div>
                                                        <div id="choices--u48b-item-choice-25"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="25"
                                                            data-value="BM" data-select-text=""
                                                            data-choice-selectable="">Bermuda</div>
                                                        <div id="choices--u48b-item-choice-26"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="26"
                                                            data-value="BT" data-select-text=""
                                                            data-choice-selectable="">Bhutan</div>
                                                        <div id="choices--u48b-item-choice-27"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="27"
                                                            data-value="BO" data-select-text=""
                                                            data-choice-selectable="">Bolivia</div>
                                                        <div id="choices--u48b-item-choice-28"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="28"
                                                            data-value="BA" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Bosnia and
                                                            Herzegovina</div>
                                                        <div id="choices--u48b-item-choice-29"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="29"
                                                            data-value="BW" data-select-text=""
                                                            data-choice-selectable="">Botswana</div>
                                                        <div id="choices--u48b-item-choice-30"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="30"
                                                            data-value="BV" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Bouvet
                                                            Island</div>
                                                        <div id="choices--u48b-item-choice-31"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="31"
                                                            data-value="BR" data-select-text=""
                                                            data-choice-selectable="">Brazil</div>
                                                        <div id="choices--u48b-item-choice-32"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="32"
                                                            data-value="IO" data-select-text=""
                                                            data-choice-selectable="">British Indian Ocean Territory
                                                        </div>
                                                        <div id="choices--u48b-item-choice-33"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="33"
                                                            data-value="BN" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Brunei
                                                            Darussalam</div>
                                                        <div id="choices--u48b-item-choice-34"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="34"
                                                            data-value="BG" data-select-text=""
                                                            data-choice-selectable="">Bulgaria</div>
                                                        <div id="choices--u48b-item-choice-35"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="35"
                                                            data-value="BF" data-select-text=""
                                                            data-choice-selectable="">Burkina Faso</div>
                                                        <div id="choices--u48b-item-choice-36"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="36"
                                                            data-value="BI" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Burundi
                                                        </div>
                                                        <div id="choices--u48b-item-choice-37"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="37"
                                                            data-value="KH" data-select-text=""
                                                            data-choice-selectable="">Cambodia</div>
                                                        <div id="choices--u48b-item-choice-38"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="38"
                                                            data-value="CM" data-select-text=""
                                                            data-choice-selectable="">Cameroon</div>
                                                        <div id="choices--u48b-item-choice-39"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="39"
                                                            data-value="CA" data-select-text=""
                                                            data-choice-selectable="">Canada</div>
                                                        <div id="choices--u48b-item-choice-40"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="40"
                                                            data-value="CV" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Cape Verde
                                                        </div>
                                                        <div id="choices--u48b-item-choice-41"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="41"
                                                            data-value="KY" data-select-text=""
                                                            data-choice-selectable="">Cayman Islands</div>
                                                        <div id="choices--u48b-item-choice-42"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="42"
                                                            data-value="CF" data-select-text=""
                                                            data-choice-selectable="">Central African Republic</div>
                                                        <div id="choices--u48b-item-choice-43"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="43"
                                                            data-value="TD" data-select-text=""
                                                            data-choice-selectable="">Chad</div>
                                                        <div id="choices--u48b-item-choice-44"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="44"
                                                            data-value="CL" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Chile
                                                        </div>
                                                        <div id="choices--u48b-item-choice-45"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="45"
                                                            data-value="CN" data-select-text=""
                                                            data-choice-selectable="">China</div>
                                                        <div id="choices--u48b-item-choice-46"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="46"
                                                            data-value="CX" data-select-text=""
                                                            data-choice-selectable="">Christmas Island</div>
                                                        <div id="choices--u48b-item-choice-47"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="47"
                                                            data-value="CC" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Cocos
                                                            (Keeling) Islands</div>
                                                        <div id="choices--u48b-item-choice-48"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="48"
                                                            data-value="CO" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Colombia
                                                        </div>
                                                        <div id="choices--u48b-item-choice-49"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="49"
                                                            data-value="KM" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Comoros
                                                        </div>
                                                        <div id="choices--u48b-item-choice-50"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="50"
                                                            data-value="CG" data-select-text=""
                                                            data-choice-selectable="">Congo</div>
                                                        <div id="choices--u48b-item-choice-51"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="51"
                                                            data-value="CD" data-select-text=""
                                                            data-choice-selectable="">Congo, The Democratic Republic of
                                                            the</div>
                                                        <div id="choices--u48b-item-choice-52"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="52"
                                                            data-value="CK" data-select-text=""
                                                            data-choice-selectable="">Cook Islands</div>
                                                        <div id="choices--u48b-item-choice-53"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="53"
                                                            data-value="CR" data-select-text=""
                                                            data-choice-selectable="">Costa Rica</div>
                                                        <div id="choices--u48b-item-choice-54"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="54"
                                                            data-value="CI" data-select-text=""
                                                            data-choice-selectable="">Cote D'Ivoire</div>
                                                        <div id="choices--u48b-item-choice-55"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="55"
                                                            data-value="HR" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Croatia
                                                        </div>
                                                        <div id="choices--u48b-item-choice-56"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="56"
                                                            data-value="CU" data-select-text=""
                                                            data-choice-selectable="">Cuba</div>
                                                        <div id="choices--u48b-item-choice-57"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="57"
                                                            data-value="CY" data-select-text=""
                                                            data-choice-selectable="">Cyprus</div>
                                                        <div id="choices--u48b-item-choice-58"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="58"
                                                            data-value="CZ" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Czech
                                                            Republic</div>
                                                        <div id="choices--u48b-item-choice-59"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="59"
                                                            data-value="DK" data-select-text=""
                                                            data-choice-selectable="">Denmark</div>
                                                        <div id="choices--u48b-item-choice-60"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="60"
                                                            data-value="DJ" data-select-text=""
                                                            data-choice-selectable="">Djibouti</div>
                                                        <div id="choices--u48b-item-choice-61"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="61"
                                                            data-value="DM" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Dominica
                                                        </div>
                                                        <div id="choices--u48b-item-choice-62"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="62"
                                                            data-value="DO" data-select-text=""
                                                            data-choice-selectable="">Dominican Republic</div>
                                                        <div id="choices--u48b-item-choice-63"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="63"
                                                            data-value="EC" data-select-text=""
                                                            data-choice-selectable="">Ecuador</div>
                                                        <div id="choices--u48b-item-choice-64"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="64"
                                                            data-value="EG" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Egypt
                                                        </div>
                                                        <div id="choices--u48b-item-choice-65"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="65"
                                                            data-value="SV" data-select-text=""
                                                            data-choice-selectable="">El Salvador</div>
                                                        <div id="choices--u48b-item-choice-66"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="66"
                                                            data-value="GQ" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Equatorial
                                                            Guinea</div>
                                                        <div id="choices--u48b-item-choice-67"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="67"
                                                            data-value="ER" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Eritrea
                                                        </div>
                                                        <div id="choices--u48b-item-choice-68"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="68"
                                                            data-value="EE" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Estonia
                                                        </div>
                                                        <div id="choices--u48b-item-choice-69"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="69"
                                                            data-value="ET" data-select-text=""
                                                            data-choice-selectable="">Ethiopia</div>
                                                        <div id="choices--u48b-item-choice-70"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="70"
                                                            data-value="FK" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Falkland
                                                            Islands (Malvinas)</div>
                                                        <div id="choices--u48b-item-choice-71"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="71"
                                                            data-value="FO" data-select-text=""
                                                            data-choice-selectable="">Faroe Islands</div>
                                                        <div id="choices--u48b-item-choice-72"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="72"
                                                            data-value="FJ" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Fiji</div>
                                                        <div id="choices--u48b-item-choice-73"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="73"
                                                            data-value="FI" data-select-text=""
                                                            data-choice-selectable="">Finland</div>
                                                        <div id="choices--u48b-item-choice-74"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="74"
                                                            data-value="FR" data-select-text=""
                                                            data-choice-selectable="">France</div>
                                                        <div id="choices--u48b-item-choice-75"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="75"
                                                            data-value="GF" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">French
                                                            Guiana</div>
                                                        <div id="choices--u48b-item-choice-76"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="76"
                                                            data-value="PF" data-select-text=""
                                                            data-choice-selectable="">French Polynesia</div>
                                                        <div id="choices--u48b-item-choice-77"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="77"
                                                            data-value="TF" data-select-text=""
                                                            data-choice-selectable="">French Southern Territories</div>
                                                        <div id="choices--u48b-item-choice-78"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="78"
                                                            data-value="GA" data-select-text=""
                                                            data-choice-selectable="">Gabon</div>
                                                        <div id="choices--u48b-item-choice-79"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="79"
                                                            data-value="GM" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Gambia
                                                        </div>
                                                        <div id="choices--u48b-item-choice-80"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="80"
                                                            data-value="GE" data-select-text=""
                                                            data-choice-selectable="">Georgia</div>
                                                        <div id="choices--u48b-item-choice-81"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="81"
                                                            data-value="DE" data-select-text=""
                                                            data-choice-selectable="" aria-selected="false">Germany
                                                        </div>
                                                        <div id="choices--u48b-item-choice-82"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="82"
                                                            data-value="GH" data-select-text=""
                                                            data-choice-selectable="">Ghana</div>
                                                        <div id="choices--u48b-item-choice-83"
                                                            class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                            role="option" data-choice="" data-id="83"
                                                            data-value="GI" data-select-text=""
                                                            data-choice-selectable="" aria-selected="true">Gibraltar
                                                        </div>
                                                        <div id="choices--u48b-item-choice-84"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="84"
                                                            data-value="GR" data-select-text=""
                                                            data-choice-selectable="">Greece</div>
                                                        <div id="choices--u48b-item-choice-85"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="85"
                                                            data-value="GL" data-select-text=""
                                                            data-choice-selectable="">Greenland</div>
                                                        <div id="choices--u48b-item-choice-86"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="86"
                                                            data-value="GD" data-select-text=""
                                                            data-choice-selectable="">Grenada</div>
                                                        <div id="choices--u48b-item-choice-87"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="87"
                                                            data-value="GP" data-select-text=""
                                                            data-choice-selectable="">Guadeloupe</div>
                                                        <div id="choices--u48b-item-choice-88"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="88"
                                                            data-value="GU" data-select-text=""
                                                            data-choice-selectable="">Guam</div>
                                                        <div id="choices--u48b-item-choice-89"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="89"
                                                            data-value="GT" data-select-text=""
                                                            data-choice-selectable="">Guatemala</div>
                                                        <div id="choices--u48b-item-choice-90"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="90"
                                                            data-value="GG" data-select-text=""
                                                            data-choice-selectable="">Guernsey</div>
                                                        <div id="choices--u48b-item-choice-91"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="91"
                                                            data-value="GN" data-select-text=""
                                                            data-choice-selectable="">Guinea</div>
                                                        <div id="choices--u48b-item-choice-92"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="92"
                                                            data-value="GW" data-select-text=""
                                                            data-choice-selectable="">Guinea-Bissau</div>
                                                        <div id="choices--u48b-item-choice-93"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="93"
                                                            data-value="GY" data-select-text=""
                                                            data-choice-selectable="">Guyana</div>
                                                        <div id="choices--u48b-item-choice-94"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="94"
                                                            data-value="HT" data-select-text=""
                                                            data-choice-selectable="">Haiti</div>
                                                        <div id="choices--u48b-item-choice-95"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="95"
                                                            data-value="HM" data-select-text=""
                                                            data-choice-selectable="">Heard Island and Mcdonald
                                                            Islands</div>
                                                        <div id="choices--u48b-item-choice-96"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="96"
                                                            data-value="VA" data-select-text=""
                                                            data-choice-selectable="">Holy See (Vatican City State)
                                                        </div>
                                                        <div id="choices--u48b-item-choice-97"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="97"
                                                            data-value="HN" data-select-text=""
                                                            data-choice-selectable="">Honduras</div>
                                                        <div id="choices--u48b-item-choice-98"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="98"
                                                            data-value="HK" data-select-text=""
                                                            data-choice-selectable="">Hong Kong</div>
                                                        <div id="choices--u48b-item-choice-99"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="99"
                                                            data-value="HU" data-select-text=""
                                                            data-choice-selectable="">Hungary</div>
                                                        <div id="choices--u48b-item-choice-100"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="100"
                                                            data-value="IS" data-select-text=""
                                                            data-choice-selectable="">Iceland</div>
                                                        <div id="choices--u48b-item-choice-101"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="101"
                                                            data-value="IN" data-select-text=""
                                                            data-choice-selectable="">India</div>
                                                        <div id="choices--u48b-item-choice-102"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="102"
                                                            data-value="ID" data-select-text=""
                                                            data-choice-selectable="">Indonesia</div>
                                                        <div id="choices--u48b-item-choice-103"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="103"
                                                            data-value="IR" data-select-text=""
                                                            data-choice-selectable="">Iran, Islamic Republic Of</div>
                                                        <div id="choices--u48b-item-choice-104"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="104"
                                                            data-value="IQ" data-select-text=""
                                                            data-choice-selectable="">Iraq</div>
                                                        <div id="choices--u48b-item-choice-105"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="105"
                                                            data-value="IE" data-select-text=""
                                                            data-choice-selectable="">Ireland</div>
                                                        <div id="choices--u48b-item-choice-106"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="106"
                                                            data-value="IM" data-select-text=""
                                                            data-choice-selectable="">Isle of Man</div>
                                                        <div id="choices--u48b-item-choice-107"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="107"
                                                            data-value="IL" data-select-text=""
                                                            data-choice-selectable="">Israel</div>
                                                        <div id="choices--u48b-item-choice-108"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="108"
                                                            data-value="IT" data-select-text=""
                                                            data-choice-selectable="">Italy</div>
                                                        <div id="choices--u48b-item-choice-109"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="109"
                                                            data-value="JM" data-select-text=""
                                                            data-choice-selectable="">Jamaica</div>
                                                        <div id="choices--u48b-item-choice-110"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="110"
                                                            data-value="JP" data-select-text=""
                                                            data-choice-selectable="">Japan</div>
                                                        <div id="choices--u48b-item-choice-111"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="111"
                                                            data-value="JE" data-select-text=""
                                                            data-choice-selectable="">Jersey</div>
                                                        <div id="choices--u48b-item-choice-112"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="112"
                                                            data-value="JO" data-select-text=""
                                                            data-choice-selectable="">Jordan</div>
                                                        <div id="choices--u48b-item-choice-113"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="113"
                                                            data-value="KZ" data-select-text=""
                                                            data-choice-selectable="">Kazakhstan</div>
                                                        <div id="choices--u48b-item-choice-114"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="114"
                                                            data-value="KE" data-select-text=""
                                                            data-choice-selectable="">Kenya</div>
                                                        <div id="choices--u48b-item-choice-115"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="115"
                                                            data-value="KI" data-select-text=""
                                                            data-choice-selectable="">Kiribati</div>
                                                        <div id="choices--u48b-item-choice-116"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="116"
                                                            data-value="KP" data-select-text=""
                                                            data-choice-selectable="">Korea, Democratic People'S
                                                            Republic of</div>
                                                        <div id="choices--u48b-item-choice-117"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="117"
                                                            data-value="KR" data-select-text=""
                                                            data-choice-selectable="">Korea, Republic of</div>
                                                        <div id="choices--u48b-item-choice-118"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="118"
                                                            data-value="KW" data-select-text=""
                                                            data-choice-selectable="">Kuwait</div>
                                                        <div id="choices--u48b-item-choice-119"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="119"
                                                            data-value="KG" data-select-text=""
                                                            data-choice-selectable="">Kyrgyzstan</div>
                                                        <div id="choices--u48b-item-choice-120"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="120"
                                                            data-value="LA" data-select-text=""
                                                            data-choice-selectable="">Lao People'S Democratic Republic
                                                        </div>
                                                        <div id="choices--u48b-item-choice-121"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="121"
                                                            data-value="LV" data-select-text=""
                                                            data-choice-selectable="">Latvia</div>
                                                        <div id="choices--u48b-item-choice-122"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="122"
                                                            data-value="LB" data-select-text=""
                                                            data-choice-selectable="">Lebanon</div>
                                                        <div id="choices--u48b-item-choice-123"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="123"
                                                            data-value="LS" data-select-text=""
                                                            data-choice-selectable="">Lesotho</div>
                                                        <div id="choices--u48b-item-choice-124"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="124"
                                                            data-value="LR" data-select-text=""
                                                            data-choice-selectable="">Liberia</div>
                                                        <div id="choices--u48b-item-choice-125"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="125"
                                                            data-value="LY" data-select-text=""
                                                            data-choice-selectable="">Libyan Arab Jamahiriya</div>
                                                        <div id="choices--u48b-item-choice-126"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="126"
                                                            data-value="LI" data-select-text=""
                                                            data-choice-selectable="">Liechtenstein</div>
                                                        <div id="choices--u48b-item-choice-127"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="127"
                                                            data-value="LT" data-select-text=""
                                                            data-choice-selectable="">Lithuania</div>
                                                        <div id="choices--u48b-item-choice-128"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="128"
                                                            data-value="LU" data-select-text=""
                                                            data-choice-selectable="">Luxembourg</div>
                                                        <div id="choices--u48b-item-choice-129"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="129"
                                                            data-value="MO" data-select-text=""
                                                            data-choice-selectable="">Macao</div>
                                                        <div id="choices--u48b-item-choice-130"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="130"
                                                            data-value="MK" data-select-text=""
                                                            data-choice-selectable="">Macedonia, The Former Yugoslav
                                                            Republic of</div>
                                                        <div id="choices--u48b-item-choice-131"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="131"
                                                            data-value="MG" data-select-text=""
                                                            data-choice-selectable="">Madagascar</div>
                                                        <div id="choices--u48b-item-choice-132"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="132"
                                                            data-value="MW" data-select-text=""
                                                            data-choice-selectable="">Malawi</div>
                                                        <div id="choices--u48b-item-choice-133"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="133"
                                                            data-value="MY" data-select-text=""
                                                            data-choice-selectable="">Malaysia</div>
                                                        <div id="choices--u48b-item-choice-134"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="134"
                                                            data-value="MV" data-select-text=""
                                                            data-choice-selectable="">Maldives</div>
                                                        <div id="choices--u48b-item-choice-135"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="135"
                                                            data-value="ML" data-select-text=""
                                                            data-choice-selectable="">Mali</div>
                                                        <div id="choices--u48b-item-choice-136"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="136"
                                                            data-value="MT" data-select-text=""
                                                            data-choice-selectable="">Malta</div>
                                                        <div id="choices--u48b-item-choice-137"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="137"
                                                            data-value="MH" data-select-text=""
                                                            data-choice-selectable="">Marshall Islands</div>
                                                        <div id="choices--u48b-item-choice-138"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="138"
                                                            data-value="MQ" data-select-text=""
                                                            data-choice-selectable="">Martinique</div>
                                                        <div id="choices--u48b-item-choice-139"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="139"
                                                            data-value="MR" data-select-text=""
                                                            data-choice-selectable="">Mauritania</div>
                                                        <div id="choices--u48b-item-choice-140"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="140"
                                                            data-value="MU" data-select-text=""
                                                            data-choice-selectable="">Mauritius</div>
                                                        <div id="choices--u48b-item-choice-141"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="141"
                                                            data-value="YT" data-select-text=""
                                                            data-choice-selectable="">Mayotte</div>
                                                        <div id="choices--u48b-item-choice-142"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="142"
                                                            data-value="MX" data-select-text=""
                                                            data-choice-selectable="">Mexico</div>
                                                        <div id="choices--u48b-item-choice-143"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="143"
                                                            data-value="FM" data-select-text=""
                                                            data-choice-selectable="">Micronesia, Federated States of
                                                        </div>
                                                        <div id="choices--u48b-item-choice-144"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="144"
                                                            data-value="MD" data-select-text=""
                                                            data-choice-selectable="">Moldova, Republic of</div>
                                                        <div id="choices--u48b-item-choice-145"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="145"
                                                            data-value="MC" data-select-text=""
                                                            data-choice-selectable="">Monaco</div>
                                                        <div id="choices--u48b-item-choice-146"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="146"
                                                            data-value="MN" data-select-text=""
                                                            data-choice-selectable="">Mongolia</div>
                                                        <div id="choices--u48b-item-choice-147"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="147"
                                                            data-value="MS" data-select-text=""
                                                            data-choice-selectable="">Montserrat</div>
                                                        <div id="choices--u48b-item-choice-148"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="148"
                                                            data-value="MA" data-select-text=""
                                                            data-choice-selectable="">Morocco</div>
                                                        <div id="choices--u48b-item-choice-149"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="149"
                                                            data-value="MZ" data-select-text=""
                                                            data-choice-selectable="">Mozambique</div>
                                                        <div id="choices--u48b-item-choice-150"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="150"
                                                            data-value="MM" data-select-text=""
                                                            data-choice-selectable="">Myanmar</div>
                                                        <div id="choices--u48b-item-choice-151"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="151"
                                                            data-value="NA" data-select-text=""
                                                            data-choice-selectable="">Namibia</div>
                                                        <div id="choices--u48b-item-choice-152"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="152"
                                                            data-value="NR" data-select-text=""
                                                            data-choice-selectable="">Nauru</div>
                                                        <div id="choices--u48b-item-choice-153"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="153"
                                                            data-value="NP" data-select-text=""
                                                            data-choice-selectable="">Nepal</div>
                                                        <div id="choices--u48b-item-choice-154"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="154"
                                                            data-value="NL" data-select-text=""
                                                            data-choice-selectable="">Netherlands</div>
                                                        <div id="choices--u48b-item-choice-155"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="155"
                                                            data-value="AN" data-select-text=""
                                                            data-choice-selectable="">Netherlands Antilles</div>
                                                        <div id="choices--u48b-item-choice-156"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="156"
                                                            data-value="NC" data-select-text=""
                                                            data-choice-selectable="">New Caledonia</div>
                                                        <div id="choices--u48b-item-choice-157"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="157"
                                                            data-value="NZ" data-select-text=""
                                                            data-choice-selectable="">New Zealand</div>
                                                        <div id="choices--u48b-item-choice-158"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="158"
                                                            data-value="NI" data-select-text=""
                                                            data-choice-selectable="">Nicaragua</div>
                                                        <div id="choices--u48b-item-choice-159"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="159"
                                                            data-value="NE" data-select-text=""
                                                            data-choice-selectable="">Niger</div>
                                                        <div id="choices--u48b-item-choice-160"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="160"
                                                            data-value="NG" data-select-text=""
                                                            data-choice-selectable="">Nigeria</div>
                                                        <div id="choices--u48b-item-choice-161"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="161"
                                                            data-value="NU" data-select-text=""
                                                            data-choice-selectable="">Niue</div>
                                                        <div id="choices--u48b-item-choice-162"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="162"
                                                            data-value="NF" data-select-text=""
                                                            data-choice-selectable="">Norfolk Island</div>
                                                        <div id="choices--u48b-item-choice-163"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="163"
                                                            data-value="MP" data-select-text=""
                                                            data-choice-selectable="">Northern Mariana Islands</div>
                                                        <div id="choices--u48b-item-choice-164"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="164"
                                                            data-value="NO" data-select-text=""
                                                            data-choice-selectable="">Norway</div>
                                                        <div id="choices--u48b-item-choice-165"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="165"
                                                            data-value="OM" data-select-text=""
                                                            data-choice-selectable="">Oman</div>
                                                        <div id="choices--u48b-item-choice-166"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="166"
                                                            data-value="PK" data-select-text=""
                                                            data-choice-selectable="">Pakistan</div>
                                                        <div id="choices--u48b-item-choice-167"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="167"
                                                            data-value="PW" data-select-text=""
                                                            data-choice-selectable="">Palau</div>
                                                        <div id="choices--u48b-item-choice-168"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="168"
                                                            data-value="PS" data-select-text=""
                                                            data-choice-selectable="">Palestinian Territory, Occupied
                                                        </div>
                                                        <div id="choices--u48b-item-choice-169"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="169"
                                                            data-value="PA" data-select-text=""
                                                            data-choice-selectable="">Panama</div>
                                                        <div id="choices--u48b-item-choice-170"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="170"
                                                            data-value="PG" data-select-text=""
                                                            data-choice-selectable="">Papua New Guinea</div>
                                                        <div id="choices--u48b-item-choice-171"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="171"
                                                            data-value="PY" data-select-text=""
                                                            data-choice-selectable="">Paraguay</div>
                                                        <div id="choices--u48b-item-choice-172"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="172"
                                                            data-value="PE" data-select-text=""
                                                            data-choice-selectable="">Peru</div>
                                                        <div id="choices--u48b-item-choice-173"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="173"
                                                            data-value="PH" data-select-text=""
                                                            data-choice-selectable="">Philippines</div>
                                                        <div id="choices--u48b-item-choice-174"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="174"
                                                            data-value="PN" data-select-text=""
                                                            data-choice-selectable="">Pitcairn</div>
                                                        <div id="choices--u48b-item-choice-175"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="175"
                                                            data-value="PL" data-select-text=""
                                                            data-choice-selectable="">Poland</div>
                                                        <div id="choices--u48b-item-choice-176"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="176"
                                                            data-value="PT" data-select-text=""
                                                            data-choice-selectable="">Portugal</div>
                                                        <div id="choices--u48b-item-choice-177"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="177"
                                                            data-value="PR" data-select-text=""
                                                            data-choice-selectable="">Puerto Rico</div>
                                                        <div id="choices--u48b-item-choice-178"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="178"
                                                            data-value="QA" data-select-text=""
                                                            data-choice-selectable="">Qatar</div>
                                                        <div id="choices--u48b-item-choice-179"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="179"
                                                            data-value="RE" data-select-text=""
                                                            data-choice-selectable="">Reunion</div>
                                                        <div id="choices--u48b-item-choice-180"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="180"
                                                            data-value="RO" data-select-text=""
                                                            data-choice-selectable="">Romania</div>
                                                        <div id="choices--u48b-item-choice-181"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="181"
                                                            data-value="RU" data-select-text=""
                                                            data-choice-selectable="">Russian Federation</div>
                                                        <div id="choices--u48b-item-choice-182"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="182"
                                                            data-value="RW" data-select-text=""
                                                            data-choice-selectable="">RWANDA</div>
                                                        <div id="choices--u48b-item-choice-183"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="183"
                                                            data-value="SH" data-select-text=""
                                                            data-choice-selectable="">Saint Helena</div>
                                                        <div id="choices--u48b-item-choice-184"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="184"
                                                            data-value="KN" data-select-text=""
                                                            data-choice-selectable="">Saint Kitts and Nevis</div>
                                                        <div id="choices--u48b-item-choice-185"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="185"
                                                            data-value="LC" data-select-text=""
                                                            data-choice-selectable="">Saint Lucia</div>
                                                        <div id="choices--u48b-item-choice-186"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="186"
                                                            data-value="PM" data-select-text=""
                                                            data-choice-selectable="">Saint Pierre and Miquelon</div>
                                                        <div id="choices--u48b-item-choice-187"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="187"
                                                            data-value="VC" data-select-text=""
                                                            data-choice-selectable="">Saint Vincent and the Grenadines
                                                        </div>
                                                        <div id="choices--u48b-item-choice-188"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="188"
                                                            data-value="WS" data-select-text=""
                                                            data-choice-selectable="">Samoa</div>
                                                        <div id="choices--u48b-item-choice-189"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="189"
                                                            data-value="SM" data-select-text=""
                                                            data-choice-selectable="">San Marino</div>
                                                        <div id="choices--u48b-item-choice-190"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="190"
                                                            data-value="ST" data-select-text=""
                                                            data-choice-selectable="">Sao Tome and Principe</div>
                                                        <div id="choices--u48b-item-choice-191"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="191"
                                                            data-value="SA" data-select-text=""
                                                            data-choice-selectable="">Saudi Arabia</div>
                                                        <div id="choices--u48b-item-choice-192"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="192"
                                                            data-value="SN" data-select-text=""
                                                            data-choice-selectable="">Senegal</div>
                                                        <div id="choices--u48b-item-choice-193"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="193"
                                                            data-value="CS" data-select-text=""
                                                            data-choice-selectable="">Serbia and Montenegro</div>
                                                        <div id="choices--u48b-item-choice-194"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="194"
                                                            data-value="SC" data-select-text=""
                                                            data-choice-selectable="">Seychelles</div>
                                                        <div id="choices--u48b-item-choice-195"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="195"
                                                            data-value="SL" data-select-text=""
                                                            data-choice-selectable="">Sierra Leone</div>
                                                        <div id="choices--u48b-item-choice-196"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="196"
                                                            data-value="SG" data-select-text=""
                                                            data-choice-selectable="">Singapore</div>
                                                        <div id="choices--u48b-item-choice-197"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="197"
                                                            data-value="SK" data-select-text=""
                                                            data-choice-selectable="">Slovakia</div>
                                                        <div id="choices--u48b-item-choice-198"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="198"
                                                            data-value="SI" data-select-text=""
                                                            data-choice-selectable="">Slovenia</div>
                                                        <div id="choices--u48b-item-choice-199"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="199"
                                                            data-value="SB" data-select-text=""
                                                            data-choice-selectable="">Solomon Islands</div>
                                                        <div id="choices--u48b-item-choice-200"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="200"
                                                            data-value="SO" data-select-text=""
                                                            data-choice-selectable="">Somalia</div>
                                                        <div id="choices--u48b-item-choice-201"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="201"
                                                            data-value="ZA" data-select-text=""
                                                            data-choice-selectable="">South Africa</div>
                                                        <div id="choices--u48b-item-choice-202"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="202"
                                                            data-value="GS" data-select-text=""
                                                            data-choice-selectable="">South Georgia and the South
                                                            Sandwich Islands</div>
                                                        <div id="choices--u48b-item-choice-203"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="203"
                                                            data-value="ES" data-select-text=""
                                                            data-choice-selectable="">Spain</div>
                                                        <div id="choices--u48b-item-choice-204"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="204"
                                                            data-value="LK" data-select-text=""
                                                            data-choice-selectable="">Sri Lanka</div>
                                                        <div id="choices--u48b-item-choice-205"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="205"
                                                            data-value="SD" data-select-text=""
                                                            data-choice-selectable="">Sudan</div>
                                                        <div id="choices--u48b-item-choice-206"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="206"
                                                            data-value="SR" data-select-text=""
                                                            data-choice-selectable="">Suriname</div>
                                                        <div id="choices--u48b-item-choice-207"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="207"
                                                            data-value="SJ" data-select-text=""
                                                            data-choice-selectable="">Svalbard and Jan Mayen</div>
                                                        <div id="choices--u48b-item-choice-208"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="208"
                                                            data-value="SZ" data-select-text=""
                                                            data-choice-selectable="">Swaziland</div>
                                                        <div id="choices--u48b-item-choice-209"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="209"
                                                            data-value="SE" data-select-text=""
                                                            data-choice-selectable="">Sweden</div>
                                                        <div id="choices--u48b-item-choice-210"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="210"
                                                            data-value="CH" data-select-text=""
                                                            data-choice-selectable="">Switzerland</div>
                                                        <div id="choices--u48b-item-choice-211"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="211"
                                                            data-value="SY" data-select-text=""
                                                            data-choice-selectable="">Syrian Arab Republic</div>
                                                        <div id="choices--u48b-item-choice-212"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="212"
                                                            data-value="TW" data-select-text=""
                                                            data-choice-selectable="">Taiwan, Province of China</div>
                                                        <div id="choices--u48b-item-choice-213"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="213"
                                                            data-value="TJ" data-select-text=""
                                                            data-choice-selectable="">Tajikistan</div>
                                                        <div id="choices--u48b-item-choice-214"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="214"
                                                            data-value="TZ" data-select-text=""
                                                            data-choice-selectable="">Tanzania, United Republic of
                                                        </div>
                                                        <div id="choices--u48b-item-choice-215"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="215"
                                                            data-value="TH" data-select-text=""
                                                            data-choice-selectable="">Thailand</div>
                                                        <div id="choices--u48b-item-choice-216"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="216"
                                                            data-value="TL" data-select-text=""
                                                            data-choice-selectable="">Timor-Leste</div>
                                                        <div id="choices--u48b-item-choice-217"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="217"
                                                            data-value="TG" data-select-text=""
                                                            data-choice-selectable="">Togo</div>
                                                        <div id="choices--u48b-item-choice-218"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="218"
                                                            data-value="TK" data-select-text=""
                                                            data-choice-selectable="">Tokelau</div>
                                                        <div id="choices--u48b-item-choice-219"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="219"
                                                            data-value="TO" data-select-text=""
                                                            data-choice-selectable="">Tonga</div>
                                                        <div id="choices--u48b-item-choice-220"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="220"
                                                            data-value="TT" data-select-text=""
                                                            data-choice-selectable="">Trinidad and Tobago</div>
                                                        <div id="choices--u48b-item-choice-221"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="221"
                                                            data-value="TN" data-select-text=""
                                                            data-choice-selectable="">Tunisia</div>
                                                        <div id="choices--u48b-item-choice-222"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="222"
                                                            data-value="TR" data-select-text=""
                                                            data-choice-selectable="">Turkey</div>
                                                        <div id="choices--u48b-item-choice-223"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="223"
                                                            data-value="TM" data-select-text=""
                                                            data-choice-selectable="">Turkmenistan</div>
                                                        <div id="choices--u48b-item-choice-224"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="224"
                                                            data-value="TC" data-select-text=""
                                                            data-choice-selectable="">Turks and Caicos Islands</div>
                                                        <div id="choices--u48b-item-choice-225"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="225"
                                                            data-value="TV" data-select-text=""
                                                            data-choice-selectable="">Tuvalu</div>
                                                        <div id="choices--u48b-item-choice-226"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="226"
                                                            data-value="UG" data-select-text=""
                                                            data-choice-selectable="">Uganda</div>
                                                        <div id="choices--u48b-item-choice-227"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="227"
                                                            data-value="UA" data-select-text=""
                                                            data-choice-selectable="">Ukraine</div>
                                                        <div id="choices--u48b-item-choice-228"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="228"
                                                            data-value="AE" data-select-text=""
                                                            data-choice-selectable="">United Arab Emirates</div>
                                                        <div id="choices--u48b-item-choice-229"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="229"
                                                            data-value="GB" data-select-text=""
                                                            data-choice-selectable="">United Kingdom</div>
                                                        <div id="choices--u48b-item-choice-230"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="230"
                                                            data-value="US" data-select-text=""
                                                            data-choice-selectable="">United States</div>
                                                        <div id="choices--u48b-item-choice-231"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="231"
                                                            data-value="UM" data-select-text=""
                                                            data-choice-selectable="">United States Minor Outlying
                                                            Islands</div>
                                                        <div id="choices--u48b-item-choice-232"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="232"
                                                            data-value="UY" data-select-text=""
                                                            data-choice-selectable="">Uruguay</div>
                                                        <div id="choices--u48b-item-choice-233"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="233"
                                                            data-value="UZ" data-select-text=""
                                                            data-choice-selectable="">Uzbekistan</div>
                                                        <div id="choices--u48b-item-choice-234"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="234"
                                                            data-value="VU" data-select-text=""
                                                            data-choice-selectable="">Vanuatu</div>
                                                        <div id="choices--u48b-item-choice-235"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="235"
                                                            data-value="VE" data-select-text=""
                                                            data-choice-selectable="">Venezuela</div>
                                                        <div id="choices--u48b-item-choice-236"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="236"
                                                            data-value="VN" data-select-text=""
                                                            data-choice-selectable="">Viet Nam</div>
                                                        <div id="choices--u48b-item-choice-237"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="237"
                                                            data-value="VG" data-select-text=""
                                                            data-choice-selectable="">Virgin Islands, British</div>
                                                        <div id="choices--u48b-item-choice-238"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="238"
                                                            data-value="VI" data-select-text=""
                                                            data-choice-selectable="">Virgin Islands, U.S.</div>
                                                        <div id="choices--u48b-item-choice-239"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="239"
                                                            data-value="WF" data-select-text=""
                                                            data-choice-selectable="">Wallis and Futuna</div>
                                                        <div id="choices--u48b-item-choice-240"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="240"
                                                            data-value="EH" data-select-text=""
                                                            data-choice-selectable="">Western Sahara</div>
                                                        <div id="choices--u48b-item-choice-241"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="241"
                                                            data-value="YE" data-select-text=""
                                                            data-choice-selectable="">Yemen</div>
                                                        <div id="choices--u48b-item-choice-242"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="242"
                                                            data-value="ZM" data-select-text=""
                                                            data-choice-selectable="">Zambia</div>
                                                        <div id="choices--u48b-item-choice-243"
                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                            role="option" data-choice="" data-id="243"
                                                            data-value="ZW" data-select-text=""
                                                            data-choice-selectable="">Zimbabwe</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check flex-nowrap p-2 border border-light rounded my-1"><input
                                            class="form-check-input mt-0 flex-shrink-0" type="checkbox"
                                            value="" id="savecard"><label class="form-check-label"
                                            for="savecard">
                                            <h6 class="mb-1">Securely save my information for 1-click checkout</h6>
                                            <p class="fs-12px lh-sm">Pay faster on Genious.AI and everywhere Link is
                                                accepted.</p>
                                        </label></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><button class="btn btn-primary w-100">Subscribe</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-note"> By confirming your subscription, you allow Genious.AI to
                                        charge your card for this payment and future payments in accordance with their
                                        terms. You can always cancel your subscription. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Dentist",
          "name": "Ortho Direction",
          "image": "{{ asset('assets/images/logo.png') }}",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "47 Bakery Street",
            "addressLocality": "London",
            "addressCountry": "UK"
          },
          "telephone": "0198-9526503",
          "url": "https://www.orthodirection.com"
        }
    </script>
    
</body>
<script src="{{ asset('assets/dashboard_ui/assets/js/bundle2888.js?v1.0.0') }}"></script>
<script src="{{ asset('assets/dashboard_ui/assets/js/scripts2888.js?v1.0.0') }}"></script>

</html>