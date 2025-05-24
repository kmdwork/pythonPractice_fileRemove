<!-- ーーーーー図面編集画面ーーーーー -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--リセット　CSS-->
    <style>html{-webkit-text-size-adjust:100%;box-sizing:border-box;-moz-tab-size:4;tab-size:4;word-break:normal}*,:after,:before{background-repeat:no-repeat;box-sizing:inherit}:after,:before{text-decoration:inherit;vertical-align:inherit}*{margin:0;padding:0}hr{color:inherit;height:0;overflow:visible}details,main{display:block}summary{display:list-item}small{font-size:80%}[hidden]{display:none}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}a{background-color:transparent}a:active,a:hover{outline-width:0}code,kbd,pre,samp{font-family:monospace,monospace}pre{font-size:1em}b,strong{font-weight:bolder}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{border-color:inherit;text-indent:0}iframe{border-style:none}input{border-radius:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto;resize:vertical}button,input,optgroup,select,textarea{font:inherit}optgroup{font-weight:700}button{overflow:visible}button,select{text-transform:none}[role=button],[type=button],[type=reset],[type=submit],button{cursor:pointer}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button:-moz-focusring{outline:1px dotted ButtonText}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}button,input,select,textarea{background-color:transparent;border-style:none}a:focus,button:focus,input:focus,select:focus,textarea:focus{outline-width:0}select{-moz-appearance:none;-webkit-appearance:none}select::-ms-expand{display:none}select::-ms-value{color:currentColor}legend{border:0;color:inherit;display:table;max-width:100%;white-space:normal}::-webkit-file-upload-button{-webkit-appearance:button;color:inherit;font:inherit}[disabled]{cursor:default}img{border-style:none}progress{vertical-align:baseline}[aria-busy=true]{cursor:progress}[aria-controls]{cursor:pointer}[aria-disabled=true]{cursor:default}</style>

    <!-- 共通のcss -->
    <style>
        /* --------------------------
        カスタムプロパティ
        ----------------------------*/
        html {
            --color-bg-bace: #eae7e7;
            --M-green: #3cb371;
            --danger: #d03b26;
            --form-bg: #f2f3f3;
        }

        /* conteinar */
        html {
            --width-content: 1080px;
        }

        /* font */
        html {
            --font-family-bace: "游ゴシック体", YuGothic, "游ゴシック Medium", "Noto Sans JP", sans-serif;
        }

        /*----------------
        共通のスタイル
        ------------------- */
        html {
            background-color: var(--color-bg-bace);
            font-family: var(--font-family-bace);
        }

        body {
            margin: 0;
            position: relative;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 3vw;
        }

        .dropdown .icon {
            font-size: 23px;
            height: 35px;
            cursor: pointer;
        }

        th h4 {
            /* color: white; */
        }

        img {
            display: block;
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }

        select {
            display: block;
        }
        select option {
            color: black;
        }

        button {
            color: black;
        }

        input {
            border: 1px black solid;
            border-radius: 5px;
            background-color: white;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        /*----------------
        header
        ------------------- */
        header {
            height: 40px;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            background-color: var(--M-green);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20%;
        }
        .header-tuika2 {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin: 5px 0;
        }
        header .p1 {
            cursor: pointer;
        }
        header h1 {
            font-size: 25px;
            text-align: center;
            /* margin-left: 20%; */
        }
        header div {
            /* height: 25px;
            width: 25px; */
        }

        /* ----------ハンバーガーメニュ---------- */

        .hamburger-menu {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 20px;
            cursor: pointer;
        }

        .hamburger-menu span {
            display: block;
            height: 4px;
            background-color: #333;
            border-radius: 2px;
            transition: all 1s ease;
        }

        /* .hamburger-menu.close span {
          display: block;
          height: 4px;
          border-radius: 2px;

        } */


        .menu {
            position: absolute;
            z-index: 5;
            top: 40px;
            left: 0;
            width: 100%;
            background-color: #f8f8f8;
            padding: 0;
            height: 0;
            opacity: 0;
            overflow: hidden;
            transition: height 1s ease, opacity 1s ease, padding 1s ease;
            box-shadow: 0px 6px 10px 0px rgba(0, 0, 0, 0.4);
        }

        .menu.open {
            padding: 10px 0;
            height: auto; /* メニューの内容に合わせて適切な高さに調整 */
            opacity: 1;
            margin-top: -6vh;
            padding-top: 6vh;
        }


        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menu ul li {
            margin: 10px 0;
        }

        .menu ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }

        .hamburger-menu.open span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 5.5px);
            transition: all 1s ease;
            background-color: #333;
        }

        .hamburger-menu.open span:nth-child(2) {
            opacity: 0;
            transition: all 1s ease;
            background-color: #333;
        }

        .hamburger-menu.open span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
            transition: all 1s ease;
            background-color: #333;
        }

        /* ----------PlusButton---------- */
        .plusbutton {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 25px;
            height: 20px;
            cursor: pointer;
        }

        .plusbutton span {
            display: block;
            height: 4px;
            background-color: #333;
            border-radius: 2px;
        }

        .plusbutton span:nth-child(1) {
            transform: rotate(-90deg) translate(-8px, 5px);
        }

        .plusbutton span:nth-child(2) {
            transform: rotate(0deg) translate(5px, -8px);
        }

        .imgMenu {
            position: fixed;
            z-index: 10;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background-color: #918e8e;
            padding: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 1s ease, opacity 1s ease, padding 1s ease;
        }

        .imgMenu.open {
            opacity: 1;
            height: 100%;
        }

        .imgMenuHeader {
            margin-top: 10px;
            display: flex;
            justify-content: space-around;
        }

        .imgMenuHeader h2 {
            text-align: center;
            margin-left: 30%;
        }

        .imgMenuCansel {
            width: 35px;
            cursor: pointer;
        }

        .imgMenuCansel span {
            display: block;
            height: 4px;
            background-color: #333;
            border-radius: 2px;
        }

        .imgMenuCansel span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 8px);
        }

        .imgMenuCansel span:nth-child(2) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }




        .imgMenuMain {
            margin: 5vh 10vw;
        }

        .input-img {
            box-sizing: border-box;
            border: 2px solid black;
            cursor: pointer;

            height: 51.76vw;
            width: 80vw;
            margin: 0 auto;
        }

        .input-img input {
            display: none;
        }

        .img-box-p2 {
            display: none;
            padding: 0 5px 0 -5px;
        }

        .img-box-p2 img {
            /* // p2の枠を操作する場合、こちらも操作する
            // widthはp2のwidth -4px */
            height: calc(51.76vw - 4px);
            width: calc(80vw - 4px);
        }


        .label-box-p2 {
            display: block;
        }

        .label-box-p2 label {
            cursor: pointer;
        }

        .label-box-p2 label svg {
            height: calc(51.76vw - 2px);
            width: calc(80vw - 2px);
        }


        @media (min-width: 768px) {
            .input-img {
                height: 25.88vw;
                width: 40vw;
                margin: 0 auto;
            }

            .label-box-p2 label svg {
                height: calc(25.88vw - 2px);
                width: calc(40vw - 2px);
            }

            .img-box-p2 img {
                /* // p2の枠を操作する場合、こちらも操作する
                // widthはp2のwidth -4px */
                height: calc(25.88vw - 4px);
                width: calc(40vw - 4px);
            }
        }
    </style>


    <style>
        a {
            text-decoration: none;
            color: inherit;
        }

        .reader-input-a, .work-photos-a {
            display: block;
            width: 94vw;
            font-size: x-large;
            font-weight: 600;
        }

        .reader-input-a svg, .work-photos-a svg {
            height: 30px;
            vertical-align: sub;
        }

        .information {
            margin-top: 40px;
        }
        .information p {
            font-weight: bold;
            font-size: small;
        }


        .reader-input {
            margin-bottom: 5px;
            /* border-top: 2px solid black;
            border-bottom: 2px solid black; */
            border: 2px solid black;
            padding-bottom: 2px;
        }
        .icon {
            font-size: 23px;
            font-weight: bolder;
        }
        .p17-inner {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .work-photos {
            margin-bottom: 5px;
            /* border-top: 2px solid black;
            border-bottom: 2px solid black; */
            border: 2px solid black;
        }
        .p16 {
            padding-top: 5px;
        }

        .list-title {
            padding-top: 5px;
            padding-bottom: 5px;
            background-color: #adabab;
            color: white;
            text-align: center;
        }
        .system-box {

            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .systemitem {
            height: 21.25vw;
            width: 21.25vw;
            border: 2px solid black;
            border-radius: 20px;
            margin: 0.5vh 0;
            position: relative;
        }

        .systemitem .danger-svg {
            position: absolute;
            top: -10px;
            right: -12px;
            height: 30px;
        }


        .systemitem:nth-child(1n), .systemitem:nth-child(2n), .systemitem:nth-child(3n) {
            margin-right: 3vw;
        }
        .systemitem:nth-child(4n) {
            margin-right: 0;
        }
        .systemitem a {
            height: 83px;
            width: 83px;
        }
        .no, .location {
            overflow: hidden;
            text-wrap: nowrap;
            font-size: small;
            height: 20px;
            text-align: center;
        }
        .no {
            font-size: medium;
            font-weight: 600;
        }
        .input_data {
            display: flex;
            justify-content: center;
        }
        .input_data div p{
            font-size: 7px;
            font-weight: bolder;
        }

        .input_rate-box, .input_rate2-box, .input_number-box {
            width: calc(83px / 3);
        }

        .input_rate1, .input_rate2, .input_number {
            text-align: center;
        }

        .input_rate1 {
            margin-right: 2.5px;
        }
        .input_rate2 {
            padding: 0 2.5px;
            border-right: black 1px dotted;
            border-left: black 1px dotted;
        }
        .input_rate2-img {
            text-align: center;
        }
        .input_rate-img svg ,.input_rate2-img svg, .input_number-img svg {
            width: 18px;
            height: 18px;
        }

        .input_number {
            margin-left: 2.5px;
        }
        .input_number-img, .input_rate2-img, .input_rate-img {
            text-align: center;
            height: 18px;
        }
        .input_number-img svg {
            margin-left: 2.5px;
        }

        @media (min-width: 768px) {
            .systemitem {
                height: 150px;
                width: 150px;
                margin: 10px;
            }    
            .systemitem a {
                height: 150px;
                width: 150px;
            }    
            .no, .location {
                height: auto;
            }
            .no {
                font-weight: 600;
                font-size: x-large;
            }
            .location {
                font-weight: 500;
                font-size: larger;
            }

            .input_data div p{
                font-size: 17px;
                font-weight: 100;
            }

            .input_rate-box, .input_rate2-box, .input_number-box {
                width: calc(150px / 3);
            }    

            .input_rate1 {
                margin-right: 2.5px;
            }
            .input_rate2 {
                padding: 0 2.5px;
                border-right: black 1px dotted;
                border-left: black 1px dotted;
            }
            .input_number {
                margin-left: 2.5px;
            }    

            .input_number-img {
                text-align: center;
            }
            .input_number-img, .input_rate2-img, .input_rate-img {
                height: 30px;
                margin-bottom: 5px;
                margin-top: 10px;
            }    
            .input_rate-img svg ,.input_rate2-img svg, .input_number-img svg {
                width: 30px;
                height: 30px;
            }
            
        }
    </style>


</head>
<body>
<header>
    <div class="header-tuika2">
        <a href="" class="tuika">＜戻る</a>
    </div>
    <h1>施工対象一覧</h1>
    <div class="hamburger-menu close">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <a href="" class="plusbutton">
        <span></span>
        <span></span>
    </a>
</header>

<nav id="menu" class="menu">
    <ul>
        <li><a href="/">Home</a></li>
    </ul>
</nav>

<div class="information">
        <p>報告番号：</p>
        <p>物件名：</p>
</div>


<div class="reader-input">
    <div class="container">
        <a class="reader-input-a" href="">
            職長入力項目
{{--             @if(empty($report['check_report_workmanager'])) --}}
{{--                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" fill="#d03b26"/></svg> --}}
{{--             @endif --}}
        </a>
    </div>
</div>

<div class="work-photos">
    <div class="container">
        <a class="work-photos-a" href="">
            作業風景写真・冷媒回収
{{--             @if(empty($report['check_report_workmanager'])) --}}
{{--                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" fill="#d03b26"/></svg> --}}
{{--             @endif --}}
        </a>
    </div>
</div>

































































































































<main>
    <div class="main-list">
{{--         @foreach($systems as $system) --}}
            <h4 class="list-title"></h4>
            <div class="container">
                <div class="system-box">
{{--                     @foreach($system['units'] as $a_unit) --}}
                        <div class="systemitem">
{{--                             @if(empty($a_unit['check_unit'])) --}}
                                <svg class="danger-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <circle cx="256" cy="256" r="210" fill="white"/>
                                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" fill="#d03b26"/>
                                </svg>
{{--                             @endif --}}

                            <a href="">
                                <div class="no">No.</div>
                                <div class="location"></div>
                                <div class="input_data">
                                    <div class="input_rate-box">
                                        <div class="input_rate-img">
{{--                                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Pro 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64l0 96c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-96c0-35.3-28.7-64-64-64L64 0zM80 128l416 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 160c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 256l-64 0 0 160c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-11.8 6.4-22.2 16-27.7c15.3-8.9 20.5-28.4 11.7-43.7s-28.4-20.5-43.7-11.7C83.4 349.4 64 380.4 64 416c0 53 43 96 96 96s96-43 96-96l0-160zm64 128c0 53 43 96 96 96s96-43 96-96c0-35.6-19.4-66.6-48-83.1c-15.3-8.8-34.9-3.6-43.7 11.7s-3.6 34.9 11.7 43.7c9.6 5.6 16 15.9 16 27.7c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-64 0 0 128z"/></svg> --}}
                                        </div>
                                        <p class="input_rate1">%</p>
                                    </div>
                                    <div class="input_rate2-box">
                                        <div class="input_rate2-img">
{{--                                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3L280 88c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 204.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg> --}}
                                        </div>
                                        <p class="input_rate2">%</p>
                                    </div>
                                    <div class="input_number-box">
                                        <div class="input_number-img">
{{--                                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg> --}}
                                        </div>
                                        <p class="input_number">枚</p>
                                    </div>
                                </div>
                            </a>
                        </div>
{{--                     @endforeach --}}
                </div>
            </div>
{{--         @endforeach --}}
    </div>
</main>

<script>
    class humburger {
        constructor() {
            this.hamburgerMenu = document.querySelector('.hamburger-menu');

            this.menu = document.querySelector('#menu');

            this.hamburgerMenu.addEventListener('click', () => this.menuElement());
        }

        menuElement() {
            if(this.hamburgerMenu.classList.contains('open')) {
                this.hamburgerMenu.classList.remove('open');
                this.hamburgerMenu.classList.add('close');
            } else {
                this.hamburgerMenu.classList.remove('close');
                this.hamburgerMenu.classList.add('open');
            }

            this.menu.classList.toggle('open');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {

        new humburger();

    });

</script>
</body>
</html>