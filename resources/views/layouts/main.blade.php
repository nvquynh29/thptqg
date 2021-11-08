<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- semantic ui cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <link rel="stylesheet" href=""> --}}
    <title>Hệ thống tra cứu điểm thi THPTQG</title>
    <link rel="shortcut icon" href="favicon.png" type="image/png">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* transition: all 0.5s ease; */
    }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }

    .highcharts-legend {
        display: none;
    }

    .container {
        -webkit-text-size-adjust: none;
        color: #222;
        font: 400 15px arial;
        font-size: 14px;
        line-height: 1.4;
        -webkit-box-direction: normal;
        text-rendering: optimizeLegibility;
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 1130px;
        padding: 0 15px;
        position: relative;
        width: 100%;
        text-align: center;
        padding-bottom: 30px;
    }
    #chart {
        /* fill="rgb(251,166,11)" */
    }

    a {
        color: black;
        text-decoration: none
    }

    li,
    ul {
        list-style-type: none;
    }


    .navigation {
        -webkit-text-size-adjust: none;
        color: #222;
        font: 400 15px arial;
        font-size: 14px;
        line-height: 1.4;
        text-rendering: optimizeLegibility;
        margin: 0;
        box-sizing: border-box;
        display: block;
        position: sticky;
        top: 0;
        background: #fff;
        box-shadow: inset 0 -1px 0 #e5e5e5;
        padding: 15px 0;
        transition: all .3s cubic-bezier(.075, .82, .165, 1);
        z-index: 99;
    }

    .navigation__logo {
        float: left;
    }

    .navigation__logo img {
        border-radius: 50%;

    }

    .navigation__items {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        color: #5e6678;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-size: 12px;
        margin-bottom: 0;
    }

    .navigation__items {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        color: #5e6678;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-size: 12px;
        margin-bottom: 0;
    }

    .navigation__item.active {
        color: #1f2228;
        font-weight: 700;
    }

    .navigation__item+* {
        margin-left: 20px;
    }

    .sticky {
        position: sticky;
        top: 0;
        z-index: 1020;
    }

    .navigation__list {
        -webkit-text-size-adjust: none;
        color: #222;
        font: 400 15px arial;
        font-size: 14px;
        line-height: 1.4;
        text-rendering: optimizeLegibility;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        float: right;
    }
    .center__navbar{
        display: flex;
        justify-content: center;
        align-items: center;
        padding:0 10px;
    }
    .section-head__title {
        -webkit-text-size-adjust: none;
        font: 400 15px arial;
        -webkit-box-direction: normal;
        text-rendering: optimizeLegibility;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: inherit;
        line-height: inherit;
        font-weight: 700;
        color: #B75C00;
        text-align: center;
        width: 100%;
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .section-head__searchform {
        -webkit-text-size-adjust: none;
        color: #222;
        font: 400 15px arial;
        font-size: 14px;
        line-height: 1.4;
        -webkit-box-direction: normal;
        text-align: center;
        text-rendering: optimizeLegibility;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        display: block;
        width: 100%;
    }

    .search_submit {
        -webkit-text-size-adjust: none;
        -webkit-box-direction: normal;
        text-rendering: optimizeLegibility;
        box-sizing: border-box;
        font-family: sans-serif;
        line-height: 1.15;
        margin: 0;
        text-transform: none;
        -webkit-appearance: button;
        overflow: visible;
        outline: none;
        cursor: pointer;
        border-radius: 4px;
        display: inline-block;
        padding: 8px;
        float: right;
        width: 122px;
        height: 50px;
        text-align: center;
        font-size: 15px;
        color: #fff;
        background: #B75C00;
        white-space: nowrap;
        border: 0;
    }

    .form-group {
        display: flex;
        justify-content: center;
    }

    .form-control {
        -webkit-text-size-adjust: none;
        -webkit-box-direction: normal;
        text-rendering: optimizeLegibility;
        box-sizing: border-box;
        line-height: 1.15;
        overflow: visible;
        background: #fff;
        font-family: arial;
        outline: none;
        transition-duration: .2s;
        transition-property: all;
        transition-timing-function: cubic-bezier(.7, 1, .7, 1);
        appearance: none;
        border: 1px solid #e5e5e5;
        color: #4F4F4F;
        padding: 4px 10px;
        font-size: 15px;
        margin: 0 10px 0 0;
        width: 310px;
        max-width: 100%;
        border-radius: 3px;
        height: 50px;
    }

    .width_common {
        float: left;
        width: 100%;
    }

    .section-head {
        background: #F7F7F7;
    }

    .section-head__title {
        font-weight: 700;
        font-family: "Merriweather", serif;
        color: #B75C00 !important;
        text-align: center;
        width: 100%;
        margin-bottom: 30px;
        margin-top: 30px;
        display: flex;
        flex-direction: column;
    }

    .section-head__title span {
        font-size: 18px;
        line-height: calc(21/18);
        display: block;
        margin-bottom: 10px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 400;
        color: #B75C00;

    }

    .section-head__title strong {
        font-size: 35px;
        color: #B75C00;

    }

</style>

<body>

    {{-- header --}}
    <header class="section top-header" data-campaign="Header" style="float:none;">
        {{-- <div class="container">
            <h1>Hello</h1>
        </div> --}}
    </header>

    {{-- nav-bar --}}
    <section class="navigation sticky">
        <div class="container" style="padding: 0">

            <nav class="center__navbar">
                 <div class="navigation__logo">
                <a href="/">
                        <img src="favicon.png"
                            height="64px" width="64px" alt="">
                </a>
            </div>
            <nav class="navigation__list">
                <ul class="navigation__items">
                    <li class="navigation__item active">
                        <a href="/">ĐIỂM THI TỐT NGHIỆP THPT</a>
                    </li>
                    <li class="navigation__item">
                        <a href="/tra-cuu-dai-hoc">tra cứu đại học</a>
                    </li>

                </ul>
            </nav>
            </nav>

        </div>
    </section>
    {{-- body --}}
    @yield('body')

    {{-- script --}}
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/data.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script>

    </script>
    {{-- footer --}}

    <footer>

    </footer>
</body>

</html>
