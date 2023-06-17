@extends('site.layout.site')

@section('title',__('site.checkout'))
@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css')}}">

@endsection
@section('subTitle',__('site.checkout'))
@section('sub_Title')
    <a href="{{route('site.cart.show')}}"> {{__('site.cart')}}</a>
    <li>
        <svg xmlns="http://www.w3.org/2000/svg" width="9.389" height="15.523" viewBox="0 0 9.389 15.523">
            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M10.331,11.888,16.545,6.02a1.062,1.062,0,0,0,0-1.567,1.228,1.228,0,0,0-1.662,0L7.842,11.1a1.064,1.064,0,0,0-.034,1.53l7.07,6.7a1.23,1.23,0,0,0,1.662,0,1.062,1.062,0,0,0,0-1.567Z" transform="translate(-7.5 -4.129)"/>
        </svg>
    </li>
    <li>
        <span>{{__('site.checkout')}}</span>
    </li>
@endsection
@section('content')

    <main>
        <div class="terminate-the-order-page">
            <div class="container-content">
                <ul class="terminate-the-order-tabs">
                    <li id="tab-0" class="active">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29.25" height="29.25" viewBox="0 0 29.25 29.25">
                                <g id="Icon_ionic-ios-information-circle-outline" data-name="Icon ionic-ios-information-circle-outline" transform="translate(-3.375 -3.375)">
                                    <path id="Path_25" data-name="Path 25" d="M16.552,12.108a1.449,1.449,0,1,1,1.441,1.406A1.408,1.408,0,0,1,16.552,12.108Zm.1,2.51h2.686V24.75H16.65Z"/>
                                    <path id="Path_26" data-name="Path 26" d="M18,5.344A12.651,12.651,0,1,1,9.049,9.049,12.573,12.573,0,0,1,18,5.344m0-1.969A14.625,14.625,0,1,0,32.625,18,14.623,14.623,0,0,0,18,3.375Z"/>
                                </g>
                            </svg>
                        </div>
                        <span>معلومات الطلب</span>
                        <div class="dots">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 25 10">
                                <g id="Group_166" data-name="Group 166" transform="translate(-1144 -465)">
                                    <g id="Ellipse_52" data-name="Ellipse 52" transform="translate(1159 465)" fill="#fff" stroke="#b074ff" stroke-width="2">
                                        <circle cx="5" cy="5" r="5" stroke="none"/>
                                        <circle cx="5" cy="5" r="4" fill="none"/>
                                    </g>
                                    <g id="Ellipse_57" data-name="Ellipse 57" transform="translate(1144 465)" fill="#fff" stroke="#b074ff" stroke-width="2">
                                        <circle cx="5" cy="5" r="5" stroke="none"/>
                                        <circle cx="5" cy="5" r="4" fill="none"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </li>
                    <li id="tab-1">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="30" viewBox="0 0 21 30">
                                <path id="Icon_material-location-on" data-name="Icon material-location-on" d="M18,3A10.492,10.492,0,0,0,7.5,13.5C7.5,21.375,18,33,18,33S28.5,21.375,28.5,13.5A10.492,10.492,0,0,0,18,3Zm0,14.25a3.75,3.75,0,1,1,3.75-3.75A3.751,3.751,0,0,1,18,17.25Z" transform="translate(-7.5 -3)"/>
                            </svg>
                        </div>
                        <span>مكان الطلب</span>
                        <div class="dots">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 25 10">
                                <g id="Group_166" data-name="Group 166" transform="translate(-1144 -465)">
                                    <g id="Ellipse_52" data-name="Ellipse 52" transform="translate(1159 465)" fill="#fff" stroke="#b074ff" stroke-width="2">
                                        <circle cx="5" cy="5" r="5" stroke="none"/>
                                        <circle cx="5" cy="5" r="4" fill="none"/>
                                    </g>
                                    <g id="Ellipse_57" data-name="Ellipse 57" transform="translate(1144 465)" fill="#fff" stroke="#b074ff" stroke-width="2">
                                        <circle cx="5" cy="5" r="5" stroke="none"/>
                                        <circle cx="5" cy="5" r="4" fill="none"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </li>
                    <li id="tab-2" >
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="37.077" height="22.04" viewBox="0 0 37.077 22.04">
                                <path id="Icon_payment-bancontact-mister-cash" data-name="Icon payment-bancontact-mister-cash" d="M8.424,27.781H23.872l1.751-1.751h5.665l-4.841,5.356H8.424ZM21.54,24.034l-3.332,3.426h5.447l1.8-1.751H32l-1.676,1.929h9.242v-3.6Zm18.5-7.376H8.119a2.582,2.582,0,0,0-2.579,2.585v16.87A2.582,2.582,0,0,0,8.119,38.7H40.038a2.582,2.582,0,0,0,2.579-2.585V19.243A2.582,2.582,0,0,0,40.038,16.658Zm1.948,19.465a2.035,2.035,0,0,1-2.035,2.035H8.206a2.035,2.035,0,0,1-2.035-2.035V19.233A2.035,2.035,0,0,1,8.206,17.2H39.951a2.035,2.035,0,0,1,2.035,2.035v16.89Zm-31.119-17.9a1.348,1.348,0,0,1,1.016,1.324,1.192,1.192,0,0,1-.332.8l-.089.1A1.252,1.252,0,0,1,12,22.071a1.276,1.276,0,0,1-1.158.791,1.327,1.327,0,0,0-.169-.021c-.667,0-1.335,0-2,0-.14,0-.149-.009-.149-.147q0-2.225,0-4.449,1.093,0,2.187,0a1.382,1.382,0,0,0,.157-.02Zm-1.079.91q0,.44-.005.88s0,.006.007.01c.164,0,.329,0,.494,0a.352.352,0,0,0,.358-.3.464.464,0,0,0-.173-.472.785.785,0,0,0-.681-.117Zm-.007,2.793a5.126,5.126,0,0,0,.611.008.422.422,0,0,0,.4-.428.457.457,0,0,0-.341-.484,4.146,4.146,0,0,0-.668-.01.4.4,0,0,0-.022.093q0,.385,0,.77c0,.017.017.034.025.051Zm12.112-.6a1.664,1.664,0,0,1,1.274-1.607,1.79,1.79,0,0,1,2.047.879,1.611,1.611,0,0,1-.926,2.274,1.887,1.887,0,0,1-.515.085,2.052,2.052,0,0,1-.6-.035A1.651,1.651,0,0,1,21.893,21.322Zm1.133-.016a.619.619,0,0,0,.613.664.642.642,0,0,0,.65-.624.611.611,0,0,0-.632-.656.578.578,0,0,0-.632.615ZM15.27,22.888c-.3,0-.593.006-.889,0-.044,0-.087-.038-.156-.07a1.9,1.9,0,0,1-.734.159,1.561,1.561,0,0,1-.86-.169.78.78,0,0,1-.393-.792,1.192,1.192,0,0,1,1.015-1.13,5.99,5.99,0,0,1,.669-.1c.037-.005.08,0,.109-.012.054-.032.119-.07.139-.121.011-.03-.056-.09-.089-.137-.035-.021-.07-.059-.106-.059-.164,0-.329,0-.493.011a.372.372,0,0,0-.116.05c-.188.041-.377.078-.562.126-.11.028-.216.075-.342.12.017-.1.029-.194.045-.284.029-.158.062-.314.089-.472.012-.073.042-.124.118-.136.209-.034.416-.07.626-.1a3.13,3.13,0,0,1,.461-.046,2.276,2.276,0,0,1,1.049.23.9.9,0,0,1,.512.612.3.3,0,0,0-.022.079c0,.681,0,1.361,0,2.042a.642.642,0,0,1-.07.2Zm-1.02-1.138a1.02,1.02,0,0,0,0-.172c0-.028-.041-.071-.062-.07a.9.9,0,0,0-.7.243.321.321,0,0,0-.056.377.4.4,0,0,0,.36.166.48.48,0,0,0,.462-.544ZM32.129,22.96a2.936,2.936,0,0,1-.43-.143.727.727,0,0,1-.417-.651,1.053,1.053,0,0,1,.455-1.017,2.033,2.033,0,0,1,.568-.258,5.525,5.525,0,0,1,.705-.1c.016,0,.033,0,.049,0,.084-.016.173-.039.177-.14s-.084-.124-.156-.126a4.277,4.277,0,0,0-.687.017c-.3.045-.59.129-.894.2.029-.16.062-.336.094-.511.011-.061.029-.121.034-.182a.178.178,0,0,1,.147-.181,3.319,3.319,0,0,1,1.837-.016,1.129,1.129,0,0,1,.625.395,2.053,2.053,0,0,1,.161.328.366.366,0,0,0-.029.1q0,1.015.01,2.029a.193.193,0,0,1-.1.193c-.278,0-.556.006-.834,0a.488.488,0,0,1-.155-.065l-.522.134c-.194-.009-.389-.018-.583-.024-.018,0-.036.017-.055.025Zm.371-.8a.328.328,0,0,0,.439.1.466.466,0,0,0,.35-.556.468.468,0,0,1,0-.1c.006-.078-.027-.124-.106-.107a2.229,2.229,0,0,0-.47.124.378.378,0,0,0-.213.536Zm-16.834.72a.9.9,0,0,1-.022-.143q0-1.408,0-2.816c0-.156,0-.157.158-.157h.852c.146,0,.146,0,.153.148,0,.016,0,.032.01.068l.13-.077a1.23,1.23,0,0,1,1.579.188,1.107,1.107,0,0,1,.3.765c.006.642,0,1.284,0,1.926a.441.441,0,0,1-.021.094.2.2,0,0,0-.062-.026c-.253,0-.506-.006-.759,0a.888.888,0,0,0-.166.033h-.026a.667.667,0,0,1-.07-.2c-.006-.479,0-.959,0-1.439a1.163,1.163,0,0,0-.025-.167.455.455,0,0,0-.325-.393.474.474,0,0,0-.558.252c-.092.01-.074.08-.072.138s.016.123.016.184c0,.424,0,.849,0,1.272,0,.1-.013.2-.02.294-.053,0-.1,0-.137,0-.2.007-.4.011-.6.024-.11.008-.224-.036-.327.031Zm9.96-3.11c.333,0,.667,0,1,0,.076,0,.118.026.114.107,0,.028,0,.057.006.106l.2-.108a1.257,1.257,0,0,1,1.514.2,1.075,1.075,0,0,1,.306.619,1.327,1.327,0,0,0-.021.169c0,.605,0,1.21,0,1.816a1.006,1.006,0,0,1-.047.212c-.317,0-.633,0-.95.007-.106,0-.108-.058-.108-.134q0-.661,0-1.321c0-.115,0-.231,0-.345a.412.412,0,0,0-.375-.418.458.458,0,0,0-.479.269c-.016.038-.027.078-.04.117a.908.908,0,0,0-.022.143q0,.842,0,1.684H25.65a1.856,1.856,0,0,1-.022-.207q0-1.453,0-2.906Zm3.314.594c0-.165,0-.329-.006-.494,0-.082.033-.1.11-.106.265-.007.265-.01.265-.282,0-.132-.005-.264,0-.395a.162.162,0,0,1,.066-.116c.349-.186.7-.365,1.052-.545.006,0,.016,0,.036,0,0,.033.008.067.008.1,0,.371,0,.741,0,1.112,0,.1.028.132.127.128.14-.007.28,0,.42,0,.056,0,.1.012.1.081,0,.247,0,.493,0,.763h-.608a.709.709,0,0,0-.034.151c0,.254,0,.508,0,.762,0,.139,0,.279,0,.418,0,.025-.024.094.051.052.148.133.307.08.466.026a.114.114,0,0,1,.084.15.621.621,0,0,0,0,.208.342.342,0,0,1-.241.42.51.51,0,0,0-.114.1,1.16,1.16,0,0,1-.874-.027.859.859,0,0,1-.537-.827c0-.452,0-.9,0-1.355-.074-.009-.148-.024-.222-.027s-.115-.016-.112-.1a.913.913,0,0,0-.032-.193ZM39.1,22.02a.425.425,0,0,0,.421.008.117.117,0,0,1,.1.136c0,.04,0,.082,0,.123a.986.986,0,0,1-.048.457,1.155,1.155,0,0,1-.824.214.9.9,0,0,1-.806-.552,1.012,1.012,0,0,1-.068-.371c-.008-.4,0-.8,0-1.2a.805.805,0,0,0-.03-.152,2.04,2.04,0,0,0-.217-.022c-.085,0-.13-.027-.129-.12,0-.213,0-.426,0-.638,0-.045.045-.087.069-.131.017,0,.033,0,.049-.005.255-.007.255-.007.255-.258,0-.135,0-.271,0-.406a.144.144,0,0,1,.085-.148c.285-.146.568-.294.852-.442.17.014.17.014.171.2,0,.3,0,.605,0,.908a.8.8,0,0,0,.031.152h.611q0,.419,0,.838l-.558,0a.654.654,0,0,0-.035.138c0,.159,0,.319,0,.479,0,.233,0,.467,0,.7,0,.044-.027.126.075.09Zm-1.809-1.129a1.807,1.807,0,0,0-.226-.115,1.2,1.2,0,0,0-.912-.035.651.651,0,0,0-.41.7.417.417,0,0,0,.189.314,1.248,1.248,0,0,0,1.247.035c.033-.014.064-.033.106-.056a.372.372,0,0,1,.013.065c0,.272,0,.543,0,.815a.132.132,0,0,1-.078.137,1.843,1.843,0,0,1-2.5-.828,1.6,1.6,0,0,1,1.111-2.181,2.3,2.3,0,0,1,1.322.081.2.2,0,0,1,.146.22c-.009.242,0,.486,0,.728,0,.036,0,.072-.006.118ZM21.6,20.833A1.275,1.275,0,0,0,20.7,20.7a.677.677,0,0,0-.55.523.479.479,0,0,0,.118.458.743.743,0,0,0,.5.247,1.717,1.717,0,0,0,.719-.073l.176-.028c0,.054.007.1.007.142,0,.185.005.37,0,.554a1.3,1.3,0,0,1-.047.225,1.7,1.7,0,0,1-1.085.187,1.6,1.6,0,0,1-.847-.335c-.077-.09-.151-.182-.233-.268a.93.93,0,0,0-.138-.1,1.456,1.456,0,0,1-.281-1.093,1.55,1.55,0,0,1,1.333-1.415,1.969,1.969,0,0,1,1.25.144.9.9,0,0,1,.045.188c.006.208.007.417,0,.625a.491.491,0,0,1-.068.159ZM8.524,18.243q0,2.225,0,4.449c0,.138.009.147.149.147.667,0,1.335,0,2,0a1.314,1.314,0,0,1,.169.021l-2.272,0a.614.614,0,0,1-.068-.009c0-.049-.006-.093-.006-.137q0-2.192,0-4.384A.86.86,0,0,1,8.52,18.2c0,.016,0,.031,0,.047Zm7.142,4.642c.1-.068.218-.024.327-.031.2-.012.4-.017.6-.024.042,0,.084,0,.137,0,.007-.094.02-.194.02-.294q0-.636,0-1.272c0-.062-.014-.123-.016-.184s-.02-.128.072-.138a1.392,1.392,0,0,0-.026.193c0,.535,0,1.071,0,1.607,0,.149,0,.151-.151.15-.321,0-.643,0-.964-.006Zm9.96-3.11q0,1.453,0,2.906a1.857,1.857,0,0,0,.022.207.355.355,0,0,1-.047-.118c0-.406,0-.813,0-1.219q0-.825,0-1.65a.684.684,0,0,1,.024-.126Zm8.652,3.113a.192.192,0,0,0,.1-.193q-.009-1.015-.01-2.029a.351.351,0,0,1,.029-.1c0,.308.008.615.009.923,0,.41,0,.821,0,1.231v.159l-.129.008Zm-19.008,0a.659.659,0,0,0,.07-.2c0-.68,0-1.361,0-2.042a.312.312,0,0,1,.022-.079c0,.073.012.147.012.221q0,.986,0,1.971c0,.072.007.149-.106.127Zm15.45.013a.5.5,0,0,1,.114-.1.342.342,0,0,0,.241-.42.621.621,0,0,1,0-.208.114.114,0,0,0-.084-.15l.122-.079c0,.258,0,.493,0,.728,0,.024-.032.057-.057.07-.109.056-.22.105-.332.157Zm-2.029-.012a1.029,1.029,0,0,0,.047-.212c0-.605,0-1.21,0-1.816a1.327,1.327,0,0,1,.021-.169q0,1.053.005,2.107c0,.053,0,.1-.076.09Zm-11-1.8a1.162,1.162,0,0,1,.025.167c0,.479,0,.959,0,1.439a.666.666,0,0,0,.07.2c-.1.02-.1-.044-.1-.116,0-.563,0-1.125,0-1.688Zm9.024,1.805q0-.842,0-1.684a.964.964,0,0,1,.022-.143q0,.869,0,1.738a.335.335,0,0,1-.024.089Zm12.292-3.114a.8.8,0,0,1-.031-.152c0-.3,0-.605,0-.908,0-.184,0-.184-.171-.2l.2-.112v1.37ZM39.1,22.02c-.1.036-.075-.046-.075-.089,0-.233,0-.467,0-.7,0-.16,0-.319,0-.479a.625.625,0,0,1,.035-.138c0,.414-.006.828,0,1.242A.617.617,0,0,0,39.1,22.02ZM30.524,22c-.076.041-.051-.028-.051-.052,0-.139,0-.279,0-.418,0-.254,0-.508,0-.762a.736.736,0,0,1,.034-.151c0,.421,0,.842,0,1.263a.7.7,0,0,0,.021.12Zm7.04-2.221c-.024.044-.068.086-.069.131-.007.213,0,.426,0,.638,0,.093.043.12.129.12a2.039,2.039,0,0,1,.217.022h-.371v-.351c0-.156,0-.311,0-.467,0-.075.025-.106.1-.093ZM21.623,22.743a1.343,1.343,0,0,0,.047-.225c.007-.185,0-.37,0-.554,0-.044,0-.088-.007-.142l-.176.028.21-.123v.223c0,.22,0,.441,0,.661,0,.062-.006.114-.077.132Zm-.023-1.91a.5.5,0,0,0,.068-.159c.008-.208.007-.417,0-.625a.893.893,0,0,0-.045-.188c.025.033.07.065.071.1.006.306,0,.611,0,.94l-.1-.066Zm-3.784,2.055a.855.855,0,0,1,.166-.034c.253,0,.506,0,.759,0a.19.19,0,0,1,.062.026l-.987,0Zm-4.449-2.369a.383.383,0,0,1,.116-.05c.164-.009.329-.013.493-.011.035,0,.07.039.106.059h-.714Zm26.2,2.226a.986.986,0,0,0,.048-.457c0-.041,0-.082,0-.123a.118.118,0,0,0-.1-.136l.118-.077c0,.251,0,.484,0,.718,0,.025-.045.05-.069.074ZM19.32,22.226a.988.988,0,0,1,.138.1c.081.085.156.178.233.268l-.371-.37Zm12.809.735c.018-.009.037-.026.055-.025.195.006.389.016.583.024h-.638Zm7.488-2.348q0-.419,0-.838c.008.013.023.027.023.04q0,.379,0,.758c0,.013-.014.027-.022.039ZM28.94,20.369a.942.942,0,0,1,.032.192c0,.088.039.1.112.1s.148.017.222.027c-.09,0-.18,0-.27,0s-.1-.03-.1-.1,0-.147,0-.221Zm-19.159.642q0,.457,0,.913c-.009-.017-.026-.034-.026-.05,0-.257,0-.513,0-.77a.4.4,0,0,1,.022-.093Zm.007-1.88q0,.445,0,.89s-.007-.006-.007-.01Q9.785,19.573,9.788,19.132ZM32.5,22.165a.533.533,0,0,0,.439.1A.328.328,0,0,1,32.5,22.165ZM11.611,37.076a1.108,1.108,0,0,1-.021-.155q0-1.141,0-2.283a.255.255,0,0,0-.029-.127l-.894,1.268c-.035-.045-.063-.079-.087-.113q-.4-.565-.794-1.13a.5.5,0,0,0-.05-.053.556.556,0,0,0-.025.113q0,1.24,0,2.48c-.362,0-.724,0-1.086.005-.082,0-.106-.034-.106-.111Q8.51,35.837,8.5,34.7a.68.68,0,0,0,.022-.119q0-.969,0-1.938a.572.572,0,0,0-.025-.118,1.016,1.016,0,0,1,.133-.017c.325,0,.651,0,.976,0a.214.214,0,0,1,.2.108c.253.375.512.747.769,1.119.025.037.052.073.089.124.044-.062.082-.113.118-.165.245-.356.491-.711.732-1.069a.226.226,0,0,1,.211-.115c.333.005.667,0,1,0,.088,0,.126.029.125.122-.011.708-.019,1.416-.028,2.123a.311.311,0,0,0-.046.106c0,.317-.005.634-.006.95,0,.371,0,.741,0,1.111,0,.084-.028.113-.117.111-.288-.006-.576,0-.864,0-.144,0-.154,0-.154-.141q0-1.068,0-2.136c0-.052.017-.1.021-.158,0-.016-.016-.034-.025-.051l-.024.006q0,1.262,0,2.526Zm25.832,0-.925.006c-.062,0-.092-.024-.09-.087,0-.033,0-.066,0-.1q0-2.1,0-4.207c0-.178,0-.178.176-.179.271,0,.543,0,.814,0a1.1,1.1,0,0,1,.143.02.21.21,0,0,0-.022.065q0,.691,0,1.382a.774.774,0,0,0,.022.132,1.158,1.158,0,0,0,.132-.056,1.326,1.326,0,0,1,1.528.06,1.141,1.141,0,0,1,.44.937q0,.92,0,1.84c0,.2,0,.2-.2.185a1.033,1.033,0,0,0-.144-.022c-.2,0-.4,0-.6,0-.173,0-.191-.017-.19-.191,0-.538.007-1.075.008-1.613,0-.015-.024-.03-.037-.045-.114-.279-.267-.394-.507-.369a.477.477,0,0,0-.427.367s-.006-.006-.01-.007a.013.013,0,0,0-.01,0c0,.036-.007.073-.007.109,0,.525,0,1.051,0,1.576a.188.188,0,0,1-.1.194ZM26.248,34.484a2.282,2.282,0,0,1,1.715-1.934,3.333,3.333,0,0,1,1.9.09.452.452,0,0,1,.065.034c.007.02.012.041.021.061.023.053.068.105.07.159.008.242.006.483,0,.725a.377.377,0,0,1-.054.125,1.633,1.633,0,0,0-.629-.236,2.472,2.472,0,0,0-1.039.041,1.253,1.253,0,0,0-.872,1.056A1.421,1.421,0,0,0,28.911,36.1a1.87,1.87,0,0,0,1.044-.277.473.473,0,0,1,.068.156c.007.242,0,.484,0,.725a.521.521,0,0,0,.02.1,3.564,3.564,0,0,1-.562.238,2.675,2.675,0,0,1-2.4-.485,2.185,2.185,0,0,1-.837-1.46q0-.306,0-.613Zm7.093,2.54-.939.005c-.012,0-.03,0-.036,0-.1-.1-.192-.013-.286.014a2.054,2.054,0,0,1-1.226.02.859.859,0,0,1-.627-.987,1.176,1.176,0,0,1,.986-1.044,6.871,6.871,0,0,1,.73-.1.5.5,0,0,0,.186-.049.185.185,0,0,0,.082-.134c0-.036-.062-.085-.106-.1a.692.692,0,0,0-.218-.033,3.436,3.436,0,0,0-1.364.238c-.019.008-.039.013-.083.027.02-.12.035-.225.056-.33.029-.153.057-.307.1-.459a.151.151,0,0,1,.085-.1c.236-.054.474-.1.711-.144.125.007.25.019.374.019s.225-.013.338-.02a1.961,1.961,0,0,1,.938.305.823.823,0,0,1,.37.585,1.219,1.219,0,0,0-.019.157c0,.645,0,1.29,0,1.934a.859.859,0,0,1-.043.2Zm-1.087-1.133c0-.3,0-.293-.294-.232a.809.809,0,0,0-.466.231.326.326,0,0,0-.061.365.424.424,0,0,0,.37.175.484.484,0,0,0,.451-.54Zm-11.817-.274a.389.389,0,0,0,.22.454,1.347,1.347,0,0,0,.936.1c.25-.061.492-.155.737-.234.072.006.082.055.082.114,0,.148,0,.3,0,.445,0,.1.013.2.02.3a1.774,1.774,0,0,1-.744.3c-.1.023-.211.031-.316.046a.076.076,0,0,0-.022-.011q-.27-.024-.541-.044s0,.034,0,.052a1.67,1.67,0,0,1-.215-3.3,1.794,1.794,0,0,1,1.09.1,1.4,1.4,0,0,1,.781,1.165c.011.069.015.139.023.208a.718.718,0,0,0-.019.144c.006.094-.039.125-.124.124-.041,0-.082,0-.123,0q-.806,0-1.613,0a1.4,1.4,0,0,0-.169.023Zm-.051-.641h1a.413.413,0,0,0-.4-.392c-.379-.039-.541.1-.6.392Zm-1.75-1.091c.177,0,.354.011.53.008.1,0,.142.025.139.132-.007.214-.006.428,0,.642,0,.088-.034.116-.116.114-.164,0-.328,0-.5,0a.991.991,0,0,0-.011.1q0,.568,0,1.136c0,.176.089.259.265.228a2.85,2.85,0,0,0,.348-.107.284.284,0,0,1,.013.064c0,.2,0,.4,0,.605a.169.169,0,0,1-.06.121A1.3,1.3,0,0,1,18.1,37.1a.842.842,0,0,1-.6-.955.711.711,0,0,0,.025-.13q0-.514,0-1.029a.718.718,0,0,0-.025-.13c-.105-.007-.21-.02-.315-.021-.077,0-.11-.026-.109-.107q.005-.362,0-.725c0-.084.037-.1.111-.106.1,0,.209-.017.313-.027a.952.952,0,0,0,.025-.142c0-.155,0-.31,0-.465,0-.074.006-.139.093-.163.011,0,.015-.034.023-.053l.924-.486a.713.713,0,0,1,.045.171c0,.345,0,.689,0,1.034a.506.506,0,0,0,.027.122Zm-1.493,2.5a1.129,1.129,0,0,1-.886.67,3.118,3.118,0,0,1-1.57-.1.183.183,0,0,1-.156-.209c.011-.242,0-.484,0-.755l.324.121a.1.1,0,0,0-.023.006c-.006,0-.008.01-.015.019a2.39,2.39,0,0,0,.968.1c.034,0,.066-.049.1-.075.116-.146.1-.245-.073-.315-.136-.054-.285-.075-.427-.116a2.315,2.315,0,0,1-.338-.114.833.833,0,0,1-.362-1.212,1.11,1.11,0,0,1,.845-.559,2.683,2.683,0,0,1,1.251.143c.027.008.065.036.067.058.024.261.043.523.064.8a4.233,4.233,0,0,0-.445-.121,3.98,3.98,0,0,0-.5-.037.245.245,0,0,0-.136.046.119.119,0,0,0,.019.222,1.4,1.4,0,0,0,.273.069,1.517,1.517,0,0,1,.843.4,1.876,1.876,0,0,1,.2.318.561.561,0,0,0-.022.1c0,.1,0,.2,0,.3,0,.08,0,.16,0,.239Zm18.618-2.416c.156.023.164.032.172.182l.037.694c-.04-.011-.074-.019-.105-.03a2,2,0,0,0-.76-.137.376.376,0,0,0-.168.028.219.219,0,0,0-.1.135c0,.037.053.1.1.12a1.112,1.112,0,0,0,.25.062,1.729,1.729,0,0,1,.725.3.871.871,0,0,1,.2,1.246,1.14,1.14,0,0,1-.773.487,3.035,3.035,0,0,1-1.559-.093.241.241,0,0,1-.043-.023.227.227,0,0,1-.1-.219c0-.192,0-.383,0-.575a.267.267,0,0,1,.017-.069h.176a2.4,2.4,0,0,0,.872.136.594.594,0,0,0,.236-.06.138.138,0,0,0,.014-.256,1.232,1.232,0,0,0-.293-.119c-.164-.051-.338-.076-.5-.141a.848.848,0,0,1-.342-1.341A2.08,2.08,0,0,1,34,34.106c.093-.017.186-.034.279-.053.012,0,.02-.024.032-.033.043-.033.082-.083.13-.094a1.881,1.881,0,0,1,.4-.058,2.588,2.588,0,0,1,.41.045c.157.024.311.056.467.082.013,0,.03-.018.045-.028Zm-11.939.17a1.223,1.223,0,0,1,.637-.326.651.651,0,0,1,.506.067.221.221,0,0,1,.088.146c.008.288,0,.576,0,.864a.337.337,0,0,1-.013.061l-.143-.074a.751.751,0,0,0-1,.245.462.462,0,0,0-.074.239c-.006.527,0,1.053,0,1.58,0,.143,0,.144-.145.144-.284,0-.568,0-.852,0-.093,0-.119-.032-.119-.122q0-1.5,0-3c0-.1.039-.124.13-.123.284,0,.568.005.852,0,.1,0,.145.032.134.134,0,.043,0,.087,0,.164Zm-9.447-.794a.652.652,0,0,1-1.105.24.671.671,0,0,1-.026-.841.659.659,0,0,1,.816-.145.574.574,0,0,0,.118.152.4.4,0,0,1,.179.353c0,.08.012.161.018.241Zm-.026.572a.247.247,0,0,1,.006.036q0,1.539,0,3.079l-.072,0a1.365,1.365,0,0,0,.023-.181q0-1.258,0-2.515v-.367H13.168l.022-.046,1.159,0Zm-2.737,3.162V34.549l.024-.006c.009.017.026.035.025.051,0,.053-.021.1-.021.157q0,1.068,0,2.136c0,.137.011.14.154.141.288,0,.576,0,.864,0,.089,0,.117-.027.117-.111,0-.37,0-.741,0-1.111,0-.317,0-.634.006-.95a.311.311,0,0,1,.046-.106l0,1.04a.768.768,0,0,0-.019.12c0,.3,0,.6,0,.9.017.333.013.263-.251.266-.313,0-.626,0-.939,0Zm24.15-3.11c-.015.01-.032.031-.045.029-.156-.026-.311-.058-.467-.082a2.532,2.532,0,0,0-.41-.045,1.885,1.885,0,0,0-.4.058c-.048.011-.088.061-.13.094-.012.009-.019.031-.032.033-.092.019-.186.036-.279.053a1.064,1.064,0,0,1,.56-.26,2.449,2.449,0,0,1,1.2.12Zm-22.57-.049-.022.046c0,.955,0,1.91,0,2.865a.867.867,0,0,0,.048.2L13.146,37c0-.657,0-1.313,0-1.97,0-.373,0-.747.007-1.12ZM38.5,35.2c.013.015.037.03.037.045,0,.538-.006,1.075-.008,1.613,0,.174.017.191.19.191.2,0,.4,0,.6,0a.961.961,0,0,1,.144.022c-.284,0-.568,0-.852.006-.1,0-.116-.039-.115-.125,0-.585,0-1.169,0-1.754ZM9.708,37.078q0-1.24,0-2.48a.532.532,0,0,1,.025-.113q0,1.228,0,2.456a.866.866,0,0,1-.025.138Zm23.633-.054a.946.946,0,0,0,.045-.2c0-.645,0-1.29,0-1.934a1.225,1.225,0,0,1,.019-.157q0,.611.006,1.222,0,.481,0,.963c0,.049.021.118-.072.106Zm-12.9-1.406A1.24,1.24,0,0,1,20.6,35.6c.538,0,1.075,0,1.613,0,.041,0,.082,0,.123,0,.085,0,.13-.029.124-.124a.712.712,0,0,1,.019-.144v.292H20.437Zm17.006,1.458a.19.19,0,0,0,.1-.194c0-.525,0-1.051,0-1.576,0-.036,0-.073.007-.109a.013.013,0,0,1,.01,0s.006,0,.01.007v1.867Zm-21.557-.92c-.033.026-.064.073-.1.075a2.406,2.406,0,0,1-.968-.1c.006-.009.01-.016.015-.019a.1.1,0,0,1,.023-.006c.23.033.46.078.691.1a1.439,1.439,0,0,0,.337-.05Zm21.677-2.046a.775.775,0,0,1-.022-.132q0-.691,0-1.382a.219.219,0,0,1,.022-.065q0,.79,0,1.579Zm-23.189-.767c-.006-.08-.014-.16-.019-.241a.4.4,0,0,0-.179-.353.575.575,0,0,1-.118-.152.6.6,0,0,1,.315.746Zm4.261.542a.555.555,0,0,1-.028-.122c0-.345,0-.689,0-1.034a.712.712,0,0,0-.045-.171c.082-.047.077.013.078.064q0,.374,0,.748c0,.171,0,.343,0,.515Zm11.333-.142a.369.369,0,0,0,.054-.125c.005-.242.007-.484,0-.725a.5.5,0,0,0-.07-.159c-.009-.019-.014-.04-.021-.061.106.028.127.1.124.2-.007.3,0,.607,0,.938l-.084-.072Zm3.86,2.327h-.176a.27.27,0,0,0-.017.069c0,.192,0,.383,0,.575a.226.226,0,0,0,.1.219c-.091-.011-.131-.055-.128-.154.007-.254,0-.508,0-.779l.221.07ZM17.493,34.851a.71.71,0,0,1,.025.13q0,.514,0,1.029a.727.727,0,0,1-.025.13q0-.644,0-1.288ZM13.146,37l.072.023H14.28l.072,0a.455.455,0,0,1-.1.023c-.333,0-.667,0-1,0-.035,0-.069-.03-.1-.047Zm.045-3.087-.041,0a.352.352,0,0,1,.082-.02q.517,0,1.035,0a.347.347,0,0,1,.082.019l-1.158,0ZM30.046,36.8a.535.535,0,0,1-.02-.1c0-.242,0-.484,0-.725a.465.465,0,0,0-.068-.156l.091-.058V36.8Zm-12.9-.422c0-.079,0-.159,0-.238,0-.1,0-.2,0-.3a.565.565,0,0,1,.022-.1A1.025,1.025,0,0,1,17.142,36.382Zm.492-3.339c-.007.018-.011.05-.023.053-.088.024-.094.089-.093.163,0,.155,0,.31,0,.465a.858.858,0,0,1-.025.142c0-.225,0-.45-.006-.675,0-.107.077-.121.148-.148ZM12.8,36.814c0-.3,0-.6,0-.9a.779.779,0,0,1,.019-.12c0,.3,0,.6,0,.9A.768.768,0,0,1,12.8,36.814Zm9.633-.011c-.007-.1-.017-.2-.02-.3,0-.148,0-.3,0-.445,0-.059-.011-.108-.082-.114l.1-.051V36.8Zm9.667-2.96c-.113.007-.225.02-.338.02s-.25-.012-.374-.019H32.1ZM20.806,37.147c0-.018,0-.052,0-.052q.27.02.54.044a.069.069,0,0,1,.022.011l-.567,0Zm5.442-2.663q0,.307,0,.613Q26.247,34.791,26.248,34.484ZM14.281,37.027H13.218a.891.891,0,0,1-.048-.2q0-1.433,0-2.865h1.136v.367q0,1.258,0,2.515a1.439,1.439,0,0,1-.024.181Z" transform="translate(-5.541 -16.658)"/>
                            </svg>
                        </div>
                        <span>طريقة الدفع</span>
                        <div class="dots">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 25 10">
                                <g id="Group_166" data-name="Group 166" transform="translate(-1144 -465)">
                                    <g id="Ellipse_52" data-name="Ellipse 52" transform="translate(1159 465)" fill="#fff" stroke="#b074ff" stroke-width="2">
                                        <circle cx="5" cy="5" r="5" stroke="none"/>
                                        <circle cx="5" cy="5" r="4" fill="none"/>
                                    </g>
                                    <g id="Ellipse_57" data-name="Ellipse 57" transform="translate(1144 465)" fill="#fff" stroke="#b074ff" stroke-width="2">
                                        <circle cx="5" cy="5" r="5" stroke="none"/>
                                        <circle cx="5" cy="5" r="4" fill="none"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </li>

                    <li id="tab-4" >
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                                <path id="Icon_material-rate-review" data-name="Icon material-rate-review" d="M26.4,3H5.6A2.6,2.6,0,0,0,3.013,5.6L3,29l5.2-5.2H26.4A2.608,2.608,0,0,0,29,21.2V5.6A2.608,2.608,0,0,0,26.4,3ZM8.2,18.6V15.389l8.944-8.944a.644.644,0,0,1,.923,0l2.3,2.3a.644.644,0,0,1,0,.923L11.411,18.6Zm15.6,0H14.05l2.6-2.6H23.8Z" transform="translate(-3 -3)"/>
                            </svg>
                        </div>
                        <span>ملاحظة</span>
                        <div class="dots">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 25 10">
                                <g id="Group_166" data-name="Group 166" transform="translate(-1144 -465)">

                                </g>
                            </svg>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container-content">
                <div class="order-information">
                    <div class="form-container">
                        <div class="form-wizard-container">
                            <form action="{{route('site.order.completeCreateOrder')}}" method="POST">
                                @csrf
                                <div class="items">
                                    <div class="form-section">
                                        @foreach(@$products as $item)
                                        <div class="item">
                                            <div class="img-box">
                                                <img src="{{ asset('images/products/'.@$item->product->id .'/'.@$item->product->main_photo->image) }}" alt="img"/>
                                            </div>
                                            <div class="info">
                                                <h3>{{@$item->product->name}}</h3>
                                                <h3> {{@$item->count}}*{{@$item->product_sale_price}}<span style="font-size: x-small;font-weight: 500;">شيكل</span></h3>
                                                @if(@$item->discount_total_product== 0)
                                                    <h3 class="text-center" >{{@$item->total_price}}<span style="font-size: x-small;font-weight: 500;">شيكل</span></h3>

                                                @else
                                                    <h3 class="text-center" class="total_price" style=" text-decoration: line-through;color: red;">{{@$item->total_price}}<span style="font-size: x-small;font-weight: 500;">شيكل</span></h3>
                                                    <h3 class="text-center">{{@$item->discount_total_product}}</h3>

                                                @endif

                                            </div>
                                        </div>

                                        @endforeach
                                        <div class="action-tab-btns">
                                            <button type="button" class="next-button btn-action">
                                                التالي
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-section order-place-section">
                                        <div class="flex-form">
                                            <div class="form-group-profile small-radius">
                                                <label for="order_place">مكان الطلب</label>
                                                <input
                                                    required
                                                    data-parsley-required-message="أدخل مكان الطلب"
                                                    type="text" id="order_place" name="address1" placeholder="مكان الطلب">
                                            </div>
                                            <div class="form-group-profile small-radius">
                                                <label for="street">الشارع</label>
                                                <input
                                                    required
                                                    data-parsley-required-message=" أدخل الشارع "
                                                    type="text" id="street" name="street" placeholder="الشارع">
                                            </div>
                                            <div class="form-group-profile small-radius">
                                                <label for="nearest_place">اقرب معلم</label>
                                                <input
                                                    required
                                                    data-parsley-required-message=" أدخل اقرب معلم "
                                                    type="text" id="nearest_place" name="near_place" placeholder="اقرب معلم">
                                            </div>
                                            <div class="form-group-profile small-radius">
                                                <label for="mobile_number">رقم الجوال</label>
                                                <input
                                                    required
                                                    data-parsley-required-message=" أدخل رقم الجوال "
                                                    type="number" id="mobile_number" name="phone_number" placeholder="رقم الجوال">
                                            </div>
                                        </div>
                                        <div class="action-tab-btns">
                                            <button type="button" class="prev-button btn-action">
                                                السابق
                                            </button>
                                            <button type="button" class="next-button btn-action">
                                                التالي
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-section payment-way-section">
                                        <div class="radio-inputs form-group">
                                            @foreach(@$payments as $item)
                                            <label for="payment-way-{{@$item->id}}" class="radio-input-custom">
                                                <input
                                                    required
                                                    data-parsley-required-message="الرجاء ادخال طريقة الدفع"
                                                    type="radio" id="payment-way-{{@$item->id}}" name="payment_way" value="{{@$item->id}}"/>
                                                <span class="check"></span>
                                                <span> {{@$item->name}} </span>
                                            </label>

                                            @endforeach
                                        </div>
                                        <div class="action-tab-btns">
                                            <button type="button" class="prev-button btn-action">
                                                السابق
                                            </button>
                                            <button type="button" class="next-button btn-action">
                                                التالي
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-section note-section">
                                    <div class="flex-note">
                                        <div class="form-group-profile small-radius">
                                            <label for="note">إذا كان لديك ملاحظات قم بإضافتها</label>
                                            <textarea name="client_note" id="note" placeholder="اكتب ملاحظتك..."></textarea>
                                        </div>
                                        <input type="hidden" value="{{json_encode($products)}}" name="product_cart[]" id="product_cart" >
                                        <input type="hidden" value="{{@$final_total}}" name="final_total" id="final_total" >
                                        <input type="hidden" value="{{@$total_before_cart}}" name="total_before_cart" id="total_before_cart" >
                                        <input type="hidden" value="{{@$discount_all_product}}" name="discount_all_product" id="discount_all_product" >

                                        <div class="final-info-order">
                                            <div class="item">
                                                <span>الطلب</span>
                                                <span>{{@$total_before_cart}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                            </div>
                                            <div class="item">
                                                <span>خدمة التوصيل</span>
                                                <span>مجاني </span>
                                            </div>
                                            <div class="item">
                                                <span>الضريبة</span>
                                                <span>0 <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                            </div>
                                            <div class="item">
                                                <span>قيمة الخصم</span>


                                                @if(@$discount_all_product < 0)
                                                    <span>{{@$discount_all_product}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                @else
                                                <span>{{ @$total_before_cart - $final_total}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>

                                                @endif
                                            </div>
                                            <div class="item">
                                                <span>الاجمالي</span>
                                                <span>{{@$final_total}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-tab-btns">
                                        <button type="button" class="prev-button btn-action">
                                            السابق
                                        </button>
                                        <button type="submit" class="next-button btn-action">
                                            إتمام الطلب
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

