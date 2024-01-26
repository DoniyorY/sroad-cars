<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$lang = Yii::$app->language;
$this->title = 'SilkRoad Samarkand';
?>

<section class="banner">
    <div class="container-fluid banner_container">
        <div class="row">
            <div class="col-md-8 left_banner">
                <div class="banner_name">
                    <p>
                        Добро пожаловать в мир комфорта
                        и безопасности с автопарком
                    </p>
                </div>
                <div class="banner_title">
                    <h1>Silk Road Samarkand!</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner_search_main">
                    <div class="banner_search_title text-center">
                        <div class="kusok_derma"></div>
                        <h4>Забронируйте трансфер от точки до точки</h4>
                    </div>
                    <div class="banner_search_form">
                        <div class="vector_line">
                            <img src="<?=$baseUrl=Yii::$app->request->baseUrl.'/img/banner_form_vector_line.png'?>" alt="">
                        </div>
                        <form action="<?=Url::to(['cars/search'])?>">
                            <div class="form-group mt-4">
                                <label for="from_address">Выберите начальнюю локацию маршрута</label>
                                <input type="text" class="form-control" placeholder="Выберите маршрут">
                            </div>
                            <div class="form-group mt-4">
                                <label for="from_address">Выберите конечную локацию маршрута</label>
                                <input type="text" class="form-control" placeholder="Выберите маршрут">
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from_address">Дата начала маршрута</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from_address">Время начала маршрута</label>
                                        <input type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group text-center">
                                <button class="btn btn-sroad" type="submit">
                                    Найти транспорт
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="properties">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h2>Наши преимущества</h2>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3>Надёжность</h3>
                            </div>
                            <div class="card_image">
                                <svg xmlns="http://www.w3.org/2000/svg" width="184" height="210" viewBox="0 0 184 210" fill="none">
                                    <path d="M91.4897 209.24C90.5567 209.24 89.6509 209.117 88.8541 208.879C68.5254 202.784 50.335 191.697 33.2411 174.971C19.3481 161.37 9.90219 146.878 4.37903 130.669C1.48465 122.143 0.00681031 113.242 0 104.211C0 79.2516 0 54.2986 0 29.3456C0 25.7294 0.967064 24.5376 4.14748 24.2515C23.0529 22.5285 40.8687 15.9293 58.5959 4.07257C62.8115 1.2531 66.8841 0 71.8215 0C72.0054 0 72.1893 0 72.3732 0C78.1143 0.108965 84.155 0.156637 91.3944 0.156637C97.4283 0.156637 103.558 0.122585 109.489 0.0885335L115.442 0.0544824C117.471 0.0544824 119.174 0.606118 120.958 1.8456C135.716 12.0883 150.297 18.7147 165.525 22.0995C169.652 23.0189 173.847 23.5841 178.144 24.1357C181.91 24.6193 183.007 25.3752 183.007 29.441C183.007 39.3908 183.007 49.3407 183.007 59.2906V69.9351C183.007 73.1836 182.993 76.4253 182.973 79.6738C182.939 86.777 182.905 94.1253 183.041 101.344C183.374 118.622 178.968 134.783 169.945 149.364C152.074 178.226 126.679 198.221 94.459 208.791C93.5669 209.083 92.5385 209.24 91.4897 209.24ZM7.08272 31.3955C7.06229 31.8042 7.04186 32.1651 7.03505 32.526C7.03505 38.6894 7.02824 44.8527 7.02143 51.016C7.001 68.5185 6.98057 86.6135 7.11678 104.409C7.15764 109.571 7.74332 114.876 8.8534 120.168C11.7342 133.877 18.1903 146.646 28.5761 159.198C44.7029 178.682 64.4528 192.793 87.281 201.129C88.8065 201.687 90.2162 201.96 91.5851 201.96C92.9539 201.96 94.2138 201.715 95.5895 201.197C121.584 191.567 143.01 175.284 159.266 152.789C170.782 136.86 176.435 119.003 176.067 99.7166C175.774 84.2912 175.842 68.6003 175.91 53.4337C175.938 46.8345 175.972 40.0106 175.972 33.3024V31.1163L175.277 31.021C174.426 30.9052 173.615 30.7962 172.812 30.6736C171.776 30.517 170.687 30.3331 169.263 30.0743C151.577 26.8871 134.701 19.7363 117.675 8.21323C116.742 7.57988 115.435 7.17126 114.338 7.16445C106.397 7.12359 98.3205 7.11678 90.5158 7.11678C83.6034 7.11678 76.4594 7.10996 69.4311 7.08272L69.3834 6.51747V7.08272C67.5991 7.08272 66.1962 7.51858 64.698 8.54013C48.7482 19.4094 32.7372 26.3287 15.7454 29.693C13.6819 30.1016 11.5707 30.4353 9.52763 30.7622C8.7172 30.8916 7.89996 31.021 7.08272 31.1572C7.08272 31.2389 7.07591 31.3138 7.0691 31.3955H7.08272Z" fill="#A08B54"/>
                                    <path d="M182.435 69.9352C182.435 80.4094 182.271 90.8837 182.476 101.358C182.809 118.568 178.464 134.531 169.461 149.064C151.625 177.872 126.522 197.669 94.2822 208.253C92.675 208.777 90.6319 208.818 89.0179 208.334C67.6199 201.926 49.484 190.069 33.6364 174.562C20.8126 162.017 10.7538 147.614 4.91732 130.479C2.01612 121.959 0.572337 113.201 0.565527 104.205C0.558716 79.2517 0.565527 54.2919 0.565527 29.3389C0.565527 26.0359 1.26699 25.0689 4.19542 24.8032C24.2654 22.9713 42.3264 15.6161 58.9027 4.52895C63.1659 1.67543 67.2861 0.463198 72.353 0.558543C86.6887 0.824145 101.031 0.687939 115.374 0.613025C117.39 0.599405 118.997 1.17828 120.625 2.30198C134.306 11.7956 149.051 19.0077 165.389 22.6444C169.557 23.5706 173.813 24.1495 178.056 24.6875C181.693 25.1506 182.428 25.7907 182.428 29.4343C182.428 42.9323 182.428 56.4303 182.428 69.9216L182.435 69.9352ZM176.537 30.6193C175.23 30.4422 174.058 30.2924 172.9 30.1153C171.722 29.9314 170.544 29.7339 169.373 29.5228C150.604 26.1449 133.707 18.3811 118.003 7.75023C116.981 7.06239 115.578 6.61291 114.352 6.6061C99.3831 6.53119 84.4141 6.58567 69.445 6.52437C67.5313 6.51756 65.9854 6.99429 64.3986 8.07713C49.5112 18.2245 33.4117 25.6273 15.6572 29.1414C12.6538 29.7339 9.61643 30.163 6.56541 30.6737C6.53136 31.4024 6.48369 31.9609 6.48369 32.5193C6.48369 56.4848 6.38153 80.4503 6.56541 104.409C6.60627 109.707 7.22601 115.088 8.31566 120.277C11.428 135.083 18.5856 147.988 28.1541 159.552C44.063 178.778 63.5541 193.052 87.0974 201.653C90.0735 202.743 92.7703 202.845 95.7941 201.722C122.048 191.996 143.371 175.761 159.729 153.116C171.212 137.235 177.014 119.541 176.639 99.703C176.217 77.5763 176.544 55.4292 176.544 33.2957C176.544 32.458 176.544 31.6272 176.544 30.6124L176.537 30.6193Z" fill="#A08B54"/>
                                    <path d="M91.3538 198.194C90.6932 198.194 90.0939 198.098 89.5831 197.908C58.2352 186.446 34.6647 166.492 19.5322 138.597C13.7026 127.85 10.7674 115.905 10.815 103.101C10.8695 88.1731 10.8559 72.9929 10.8491 58.3099C10.8491 51.8741 10.8423 45.4384 10.8423 39.0026C10.8423 35.1821 11.4961 34.3852 15.1941 33.6702C32.5195 30.3263 49.1026 23.3389 65.8832 12.3062C67.2861 11.38 69.1862 10.8011 70.8479 10.7875C78.0464 10.7262 85.3675 10.7262 92.4434 10.7262C98.634 10.7262 105.036 10.7262 111.335 10.6854H111.424C113.828 10.6854 115.83 11.3051 117.914 12.6876C133.421 22.978 148.942 29.6725 165.375 33.1526C166.403 33.3705 167.432 33.5816 168.46 33.7927C171.307 34.3716 172.179 35.4408 172.179 38.3761C172.185 46.8141 172.179 55.2452 172.179 63.6832V72.9589C172.179 75.7988 172.158 78.6455 172.138 81.4854C172.09 87.6759 172.049 94.0708 172.226 100.35C172.703 117.185 168.058 133.012 158.415 147.402C142.452 171.211 120.72 188.155 93.8191 197.765C93.0563 198.037 92.1846 198.187 91.3674 198.187L91.3538 198.194ZM17.8637 42.4623C17.8637 48.3941 17.8637 54.3258 17.8705 60.2644C17.8841 74.2664 17.8909 88.752 17.8365 102.992C17.7956 114.161 20.2473 124.595 25.1235 134.006C38.4308 159.695 59.9719 178.675 89.1404 190.416C89.944 190.743 90.7136 190.9 91.4832 190.9C92.3208 190.9 93.1653 190.716 94.1528 190.335C117.199 181.277 136.118 166.607 150.379 146.721C160.587 132.495 165.579 116.681 165.218 99.737C164.939 86.4705 165.007 72.9725 165.069 59.9239C165.096 54.2373 165.123 48.36 165.123 42.5781V40.426C165.089 40.4124 165.048 40.3988 165.014 40.3851C164.749 40.2762 164.517 40.1808 164.299 40.14C147.164 36.585 130.724 29.5772 114.039 18.7079C113.215 18.1699 112.064 17.8362 111.036 17.8294C104.327 17.7953 97.7691 17.7749 91.5513 17.7749C84.8772 17.7749 78.3052 17.7953 72.0329 17.8362C70.9501 17.843 69.6561 18.2448 68.6686 18.885C56.3488 26.853 44.4988 32.6009 32.4446 36.4488C29.1007 37.518 25.7705 38.4101 22.2563 39.35C20.7989 39.7382 19.3347 40.1332 17.8501 40.5418V42.4759L17.8637 42.4623Z" fill="#A08B54"/>
                                    <path d="M171.607 72.9658C171.607 82.1052 171.396 91.2446 171.654 100.377C172.145 117.478 167.371 133.026 157.938 147.096C142.023 170.823 120.57 187.611 93.6218 197.247C92.4572 197.663 90.9045 197.799 89.7808 197.39C59.3183 186.248 35.598 167.03 20.0296 138.345C14.1114 127.435 11.3328 115.605 11.3805 103.122C11.4554 81.7579 11.4009 60.3871 11.4009 39.0232C11.4009 35.4954 11.83 34.9166 15.2964 34.2423C33.7728 30.6737 50.533 23.087 66.1831 12.7967C67.4975 11.9318 69.2749 11.3869 70.8413 11.3733C84.3325 11.2643 97.8306 11.3529 111.322 11.2712C113.692 11.2575 115.619 11.8705 117.587 13.178C132.229 22.8895 147.982 30.0676 165.246 33.7248C166.274 33.9427 167.309 34.1538 168.338 34.3649C170.905 34.8825 171.607 35.7202 171.607 38.3966C171.613 49.9265 171.607 61.4495 171.607 72.9794V72.9658ZM17.2986 40.106V42.4624C17.2986 62.6345 17.3531 82.8135 17.2782 102.986C17.2374 114.025 19.5801 124.52 24.6265 134.259C38.7103 161.439 60.8165 179.615 88.9363 190.934C90.8432 191.704 92.5049 191.581 94.3641 190.852C117.478 181.767 136.384 167.207 150.842 147.042C160.949 132.951 166.158 117.301 165.791 99.7167C165.389 80.675 165.702 61.6198 165.702 42.5713C165.702 41.7337 165.702 40.896 165.702 40.0311C165.212 39.854 164.83 39.6565 164.435 39.5748C146.313 35.8155 129.812 28.2765 114.373 18.2245C113.447 17.6184 112.18 17.2574 111.07 17.2574C98.0621 17.1893 85.0612 17.1825 72.0536 17.2642C70.8209 17.271 69.4248 17.7273 68.3828 18.4084C57.0709 25.7294 45.1528 31.8042 32.295 35.9109C27.4256 37.4636 22.4472 38.6827 17.3055 40.1128L17.2986 40.106Z" fill="#A08B54"/>
                                    <path d="M51.8673 127.114C50.5801 127.114 49.3747 126.318 48.3804 124.806C44.0286 118.206 41.3454 110.872 40.3987 102.999C37.8312 81.5057 48.898 60.6184 67.9464 51.0227C75.6966 47.1204 83.6033 45.1386 91.4556 45.1386C99.7914 45.1386 108.236 47.3656 116.558 51.765C116.96 51.9762 117.362 52.2009 117.832 52.4597L117.812 52.378C117.641 51.5607 117.485 50.8388 117.348 50.1169C117.124 48.9456 117.308 47.8491 117.873 47.0183C118.35 46.3168 119.058 45.8605 119.916 45.7039C120.222 45.6494 120.522 45.6153 120.801 45.6153C122.449 45.6153 123.648 46.596 124.091 48.3054C125.01 51.8944 126.072 56.1441 126.999 60.4005C127.244 61.531 127.053 62.5866 126.461 63.3698C125.861 64.1666 124.881 64.6502 123.702 64.7319C119.766 64.9975 115.578 65.1677 111.246 65.229H111.171C109.128 65.229 107.794 63.9214 107.685 61.8239C107.589 59.8557 108.917 58.4596 111.069 58.2621C111.805 58.194 112.534 58.1531 113.426 58.0986C109.19 55.6061 104.96 54.0124 100.227 53.1067C97.3465 52.555 94.4249 52.2758 91.5374 52.2758C69.1314 52.2758 50.6006 68.4571 47.4815 90.7473C46.0377 101.051 48.1284 110.919 53.6925 120.072C53.7878 120.229 53.89 120.386 53.9921 120.542C54.0806 120.679 54.176 120.815 54.2577 120.958C56.2599 124.172 54.7821 125.827 53.7197 126.529C53.1272 126.917 52.5075 127.114 51.8741 127.114H51.8673Z" fill="#A08B54"/>
                                    <path d="M118.635 53.5494C118.343 52.1465 118.111 51.0841 117.907 50.0081C117.539 48.1352 118.383 46.5552 120.018 46.2556C121.809 45.9219 123.089 46.6846 123.546 48.4485C124.574 52.4598 125.575 56.4779 126.447 60.5232C126.883 62.5254 125.752 64.0305 123.661 64.1735C119.528 64.4527 115.38 64.6094 111.233 64.6707C109.462 64.6979 108.338 63.6627 108.243 61.7967C108.161 60.1214 109.271 58.9909 111.11 58.8274C112.275 58.7185 113.439 58.6708 115.237 58.555C110.259 55.3746 105.451 53.529 100.329 52.5551C74.6272 47.6449 50.5459 64.7933 46.916 90.6724C45.4314 101.276 47.6311 111.206 53.2087 120.372C53.3926 120.672 53.5969 120.958 53.7808 121.258C55.102 123.376 54.9726 125.03 53.4062 126.059C51.8671 127.074 50.185 126.508 48.857 124.499C44.5256 117.934 41.8968 110.722 40.9638 102.938C38.4236 81.6692 49.1566 61.1293 68.2051 51.5336C84.257 43.4429 100.391 43.8652 116.299 52.2691C116.974 52.6232 117.634 52.9978 118.642 53.5562L118.635 53.5494Z" fill="#A08B54"/>
                                    <path d="M91.1153 148.254C82.7182 148.254 74.4573 146.068 66.5505 141.75C66.1214 141.518 65.6992 141.28 65.1544 140.98C65.168 141.028 65.1748 141.076 65.1884 141.123C65.3791 141.982 65.5426 142.717 65.6856 143.459C65.8967 144.583 65.6992 145.645 65.1339 146.463C64.63 147.185 63.8877 147.648 62.9751 147.798C62.7095 147.838 62.4507 147.866 62.2055 147.866C60.5506 147.866 59.3384 146.844 58.8889 145.067C57.7788 140.674 56.8594 137.01 56.0217 133.183C55.7561 131.977 55.94 130.922 56.5461 130.132C57.1931 129.287 58.2555 128.81 59.6312 128.742C63.6425 128.552 67.5448 128.395 71.2292 128.293C71.2973 128.293 71.3654 128.293 71.4335 128.293C73.7762 128.293 75.2336 129.512 75.3358 131.555C75.4448 133.721 73.9329 135.158 71.3926 135.307C71.018 135.328 70.6367 135.335 70.2281 135.335C69.9829 135.335 69.7241 135.335 69.4517 135.335C69.5402 135.396 69.6151 135.45 69.6968 135.498C76.1598 139.285 83.5558 141.287 91.0948 141.287C112.895 141.287 131.882 125.473 135.253 104.504C137.092 93.0699 134.933 82.3368 128.838 72.6117C127.959 71.2088 127.632 70.0919 127.871 69.2883C128.184 68.2395 129.444 66.6186 130.629 66.5641C130.67 66.5641 130.717 66.5641 130.758 66.5641C132.038 66.5641 133.659 67.4018 134.368 68.4302C138.549 74.4982 141.205 81.2472 142.268 88.4797C144.277 102.182 141.185 115.68 133.564 126.502C125.936 137.337 114.277 144.74 100.745 147.348C97.5238 147.968 94.2821 148.281 91.1085 148.281L91.1153 148.254Z" fill="#A08B54"/>
                                    <path d="M64.3306 139.877C64.6575 141.396 64.9163 142.472 65.1206 143.555C65.4679 145.393 64.5622 146.946 62.8732 147.232C61.0617 147.532 59.8699 146.66 59.4272 144.917C58.4261 140.973 57.4318 137.023 56.5668 133.046C56.0833 130.826 57.316 129.403 59.6519 129.287C63.5134 129.103 67.3748 128.946 71.2363 128.837C73.436 128.776 74.6755 129.784 74.764 131.562C74.8525 133.414 73.6131 134.592 71.352 134.722C70.3713 134.776 69.3907 134.728 67.8583 134.728C68.6415 135.355 68.9889 135.709 69.4043 135.954C95.7738 151.4 130.942 134.749 135.805 104.559C137.671 92.9607 135.553 82.2277 129.308 72.271C128.777 71.4265 128.164 70.2075 128.409 69.4107C128.702 68.4504 129.832 67.1292 130.649 67.0884C131.725 67.0407 133.271 67.7966 133.898 68.7092C138.018 74.6887 140.647 81.3287 141.703 88.5204C145.809 116.531 128.341 141.416 100.63 146.755C88.766 149.044 77.4336 147.048 66.8027 141.246C66.1285 140.878 65.4611 140.51 64.317 139.877H64.3306Z" fill="#A08B54"/>
                                    <path d="M75.7242 117.566C74.3213 117.566 73.2997 116.463 72.1828 114.808C70.5279 112.35 68.873 109.884 67.2249 107.419C64.2965 103.054 61.3749 98.6951 58.4328 94.3433C57.4862 92.9404 56.7098 91.2582 58.14 89.4399C58.8006 88.6022 59.7131 88.1391 60.7075 88.1391C61.9878 88.1391 63.2341 88.8882 64.1194 90.2026C66.7414 94.0709 69.3429 97.9596 71.9445 101.841C73.1771 103.68 74.403 105.512 75.6357 107.351C75.9149 107.766 76.2009 108.168 76.5142 108.618L76.6708 108.842L95.3038 93.7167L101.712 88.5068C106.337 84.7476 110.968 80.9883 115.599 77.2358C116.62 76.4049 117.614 75.9895 118.561 75.9895C119.419 75.9895 120.189 76.33 120.87 76.9974C121.619 77.7397 121.993 78.6115 121.953 79.5172C121.898 80.6069 121.244 81.7034 120.046 82.684C116.423 85.6465 112.793 88.5886 109.156 91.5374L104.825 95.0516L97.6398 100.888C91.4696 105.9 85.2995 110.906 79.1225 115.912C77.6787 117.083 76.664 117.58 75.7242 117.58V117.566Z" fill="#A08B54"/>
                                    <path d="M76.5544 109.646C83.0106 104.409 89.3306 99.2739 95.6573 94.1389C102.42 88.643 109.183 83.1471 115.952 77.658C117.689 76.2482 119.255 76.1801 120.467 77.3787C121.911 78.8089 121.652 80.6137 119.684 82.2277C114.624 86.3684 109.544 90.475 104.47 94.5884C95.9025 101.542 87.342 108.502 78.7678 115.448C75.9415 117.737 74.702 117.532 72.6521 114.481C68.0688 107.657 63.4991 100.827 58.9021 94.0163C57.9691 92.6339 57.4106 91.2718 58.582 89.7803C59.91 88.0914 62.2255 88.4046 63.6489 90.509C67.5103 96.2093 71.3309 101.937 75.1719 107.651C75.5942 108.277 76.0368 108.89 76.5544 109.639V109.646Z" fill="#A08B54"/>
                                </svg>
                            </div>
                            <div class="card_desc">
                                <p>
                                    Мы гарантируем точное и надежное выполнение всех услуг, чтобы ваше путешествие началось с хорошего настроения.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3>Комфорт</h3>
                            </div>
                            <div class="card_image">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="193" viewBox="0 0 150 193" fill="none">
                                    <path d="M35.8821 151.594C64.0777 141.383 84.5971 141.144 113.109 151.465C115.386 147.33 117.347 142.944 120.037 139.061C124.133 133.139 129.732 129.172 137.305 131.075C144.878 132.978 148.084 139.119 148.794 146.273C150.297 161.451 146.278 175.758 140.627 189.614C140.001 191.149 136.854 192.511 134.867 192.517C94.6536 192.685 54.4469 192.704 14.2338 192.459C12.0987 192.446 8.56375 190.162 8.07995 188.318C5.02236 176.539 2.3776 164.637 0.210196 152.665C-0.415513 149.195 0.455332 145.202 1.51323 141.712C5.02237 130.172 17.0205 126.998 25.7868 135.236C28.1284 137.435 29.9927 140.241 31.7021 143.002C33.2889 145.569 34.3791 148.446 35.8756 151.594H35.8821ZM74.0955 185.905C92.6668 185.905 111.238 185.976 129.803 185.802C131.854 185.783 135.247 184.808 135.731 183.454C140.066 171.288 144.02 158.871 141.614 145.756C141.079 142.854 138.202 138.958 135.647 138.254C133.138 137.564 128.597 139.525 126.855 141.789C123.617 146.014 121.333 151.149 119.463 156.206C117.889 160.451 115.966 161.006 112.128 159.219C87.2806 147.705 62.3296 147.614 37.456 159.109C33.3599 160.999 30.9925 160.683 29.7088 155.936C28.8638 152.801 27.606 149.691 26.0191 146.866C23.3485 142.112 20.478 136.377 13.8855 137.887C6.88014 139.493 7.28006 146.202 6.73176 151.826C6.66725 152.472 6.69952 153.149 6.82853 153.787C8.6476 162.747 10.557 171.688 12.2857 180.661C13.1114 184.931 15.5304 186.034 19.6846 185.989C37.8173 185.789 55.9499 185.905 74.0826 185.912L74.0955 185.905Z" fill="#A08B54"/>
                                    <path d="M107.258 38.3602C124.288 45.372 129.442 53.1966 129.442 72.6968C129.442 86.9139 129.59 101.138 129.28 115.348C129.235 117.535 127.049 119.677 125.855 121.844C124.823 119.741 122.933 117.645 122.894 115.522C122.623 100.434 122.81 85.34 122.688 70.2456C122.552 53.2804 114.044 44.8043 97.2661 44.7656C81.7394 44.7334 66.2128 44.6947 50.6862 44.7785C35.9014 44.8559 26.8963 53.4675 26.606 68.2588C26.3222 83.1274 26.5351 98.009 26.5222 112.878C26.5222 114.626 26.8447 116.503 26.3158 118.09C25.8513 119.496 24.4064 120.58 23.4001 121.805C22.2067 120.535 19.9877 119.264 19.9748 117.98C19.8587 99.3959 19.3555 80.7729 20.3876 62.2339C21.0262 50.7905 28.5606 43.9271 41.9714 38.3408C41.6295 30.8194 40.9264 23.5238 41.049 16.2475C41.2102 6.4361 47.3964 0.366072 57.2207 0.172554C68.806 -0.0532175 80.4041 -0.0661188 91.9894 0.185455C101.885 0.398325 107.987 6.4103 108.161 16.2475C108.29 23.369 107.6 30.4969 107.245 38.3602H107.258ZM74.9921 37.7538V37.7796C77.1724 37.7796 79.3592 37.7796 81.5395 37.7796C101.265 37.7796 102.136 36.8701 101.336 17.0474C101.059 10.2549 98.0207 7.0231 91.2605 6.87474C83.623 6.70702 75.9726 7.08116 68.348 6.77798C45.6483 5.88135 47.8415 10.1129 47.9576 28.2779C47.9963 34.3092 51.2732 37.5861 57.3174 37.728C63.2068 37.8635 69.1027 37.7603 74.9921 37.7603V37.7538Z" fill="#A08B54"/>
                                    <path d="M82.2493 124.624C83.204 108.446 85.8487 94.1773 93.5314 81.2696C94.7505 79.2183 95.9955 76.9606 97.8081 75.5544C99.1628 74.5029 101.459 74.6642 103.343 74.2901C103.175 76.1865 103.71 78.6184 102.736 79.8892C95.7117 88.991 92.3316 99.5055 90.506 110.575C89.5513 116.367 89.6288 122.321 88.7515 128.133C88.4225 130.301 86.7131 132.262 85.6358 134.313C84.507 132.133 83.1459 130.043 82.3331 127.753C81.8558 126.398 82.2428 124.727 82.2428 124.631L82.2493 124.624Z" fill="#A08B54"/>
                                    <path d="M66.9809 123.308C66.9809 125.489 67.3357 127.753 66.8648 129.83C66.4972 131.436 65.0974 132.804 64.1556 134.274C62.9042 132.855 60.8012 131.565 60.5626 129.991C59.7562 124.618 59.8466 119.115 59.1499 113.723C57.5759 101.46 54.0991 89.8876 46.4938 79.7988C45.5326 78.5281 46.1067 76.1026 45.9648 74.2126C47.8484 74.6384 50.8157 74.4642 51.4414 75.593C55.5311 82.9661 59.9691 90.3262 62.6268 98.254C65.2973 106.221 66.0327 114.832 67.6131 123.16C67.4002 123.211 67.1874 123.257 66.9745 123.308H66.9809Z" fill="#A08B54"/>
                                </svg>
                            </div>
                            <div class="card_desc">
                                <p>
                                    Все наши транспортные средства поддерживаются в идеальном состоянии, а ваша безопасность - нашей первостепенной заботой.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body card_secondary">
                            <div class="card_title">
                                <h3>Профессионализм</h3>
                            </div>
                            <div class="card_image">
                                <svg xmlns="http://www.w3.org/2000/svg" width="186" height="193" viewBox="0 0 186 193" fill="none">
                                    <g clip-path="url(#clip0_169_124)">
                                        <path d="M91.384 193C74.6588 193 59.5478 189.105 46.4634 181.415C33.372 173.724 22.2716 162.217 13.461 147.213C-5.55395 114.809 -4.41618 81.6238 16.8459 48.5805C17.1161 48.1612 17.4077 47.7489 17.6992 47.3438C17.8841 47.0879 18.0619 46.8391 18.2396 46.5833C19.6619 44.5292 20.8423 43.5767 21.9587 43.5767C22.5703 43.5767 23.2529 43.861 23.9925 44.4226C25.8271 45.8156 25.6991 47.1803 23.4378 50.2437C15.3454 61.232 10.2255 73.6348 7.77928 88.1699C1.9411 122.94 21.2121 161.03 52.6074 176.773C53.1336 177.036 53.674 177.242 54.2927 177.477C54.6198 177.598 54.9754 177.74 55.3878 177.903L56.8171 178.479L60.2518 167.448C62.442 160.412 64.6109 153.46 66.7513 146.509C68.1735 141.889 69.5815 137.255 70.9895 132.628C74.0046 122.692 77.1263 112.414 80.3903 102.371C82.1752 96.8696 82.1467 92.4202 80.2978 87.9424C79.2454 85.405 78.449 82.7112 77.6099 79.8682C77.2188 78.5391 76.8134 77.1673 76.3654 75.76L75.8392 74.1039C75.8392 74.1039 69.8588 77.4161 67.6615 78.6386C62.5629 81.4674 57.7487 84.1399 52.8207 86.8336C50.9363 87.8643 49.5425 88.3689 48.5683 88.3689C47.523 88.3689 46.4065 87.779 45.3257 83.4931C43.5195 76.3286 41.7275 69.1641 39.9355 61.9997C36.7568 49.2913 33.4715 36.1422 30.1436 23.2348C29.1836 19.5246 29.4538 16.5394 31.0467 13.2628C32.476 10.3202 33.4929 7.99606 34.3106 6.12676C36.9417 0.120829 36.9986 0 41.2439 0C42.1044 0 43.0999 0.0213228 44.259 0.0568609C45.8874 0.0995065 47.9141 0.14926 50.3461 0.14926H51.3914C62.9398 0.0781837 74.3743 0.0710761 83.0427 0.0710761C87.7147 0.0710761 106.41 0.0852913 111.082 0.0852913C119.992 0.0852913 131.732 0.0781837 143.544 0.00710761H143.629C147.547 0.00710761 149.133 1.5921 151.017 4.91136C155.824 13.3978 156.564 21.799 153.407 32.1477C149.858 43.7829 146.978 55.8089 144.191 67.4441C142.911 72.789 141.588 78.3187 140.216 83.7276C139.035 88.3902 137.784 88.3902 137.108 88.3902C136.184 88.3902 134.861 87.9211 133.083 86.9474C128.255 84.3176 123.483 81.6664 118.442 78.866C116.223 77.6364 113.969 76.3855 111.665 75.1061L110.115 74.2461L109.61 75.9448C109.112 77.6364 108.55 79.3209 108.01 80.9414C105.414 88.7527 102.961 96.1233 106.296 105.399C111.942 121.085 116.898 137.34 121.684 153.062C123.682 159.623 125.745 166.396 127.835 173.049C128.07 173.795 128.34 174.527 128.653 175.373C128.817 175.814 128.994 176.297 129.186 176.844L129.713 178.309L131.128 177.655C139.54 173.76 147.149 168.266 154.395 160.859C183.152 131.462 186.949 85.5401 163.426 51.6581C163.156 51.2672 162.857 50.8692 162.559 50.4711C161.449 48.9856 160.311 47.4504 160.503 46.2563C160.61 45.6237 161.129 44.9769 162.061 44.3373C162.822 43.8113 163.497 43.5483 164.08 43.5483C165.559 43.5483 166.818 45.3963 168.027 47.1874C168.233 47.4859 168.432 47.7845 168.631 48.0688C187.625 75.2198 190.597 109.471 176.582 139.693C162.658 169.715 134.79 189.453 102.036 192.495C98.4382 192.829 94.8542 193 91.3911 193H91.384ZM92.9626 98.4404C88.8382 98.4404 87.4018 100.459 86.5058 103.487C83.5192 113.615 80.3618 123.879 77.297 133.801L74.9361 141.477C72.177 150.461 69.4037 159.438 66.6375 168.393L62.7762 180.91L63.9211 181.422C71.6152 184.876 81.9121 186.774 92.8986 186.774C104.006 186.774 114.402 184.84 122.168 181.322L123.213 180.846L122.971 179.723C122.893 179.36 122.829 179.034 122.772 178.721C122.651 178.095 122.538 177.505 122.353 176.915C120.234 170.121 118.1 163.333 115.974 156.538C110.527 139.146 104.895 121.156 99.4266 103.444C98.5022 100.438 97.0444 98.4404 92.9484 98.4333L92.9626 98.4404ZM92.92 65.9657C89.4071 65.9657 85.9867 67.7071 82.4525 71.2822L81.8481 71.8935L82.1041 72.7108C82.5165 74.0186 82.9289 75.3549 83.3414 76.6982C84.5289 80.5719 85.7663 84.5734 87.224 88.4968C87.864 90.2098 90.3742 91.5673 92.1164 91.5957H92.2587C92.472 91.5957 97.4924 91.5673 98.4595 89.1223C100.095 84.9786 101.347 80.778 102.563 76.7124C102.968 75.3691 103.359 74.0542 103.75 72.7819L103.999 71.9787L103.416 71.3746C99.8888 67.7355 96.4613 65.9657 92.92 65.9657ZM38.4066 10.7609C38.0866 12.1611 37.6813 13.4476 37.3257 14.5848C36.5862 16.9303 35.9462 18.956 36.4013 20.9035C39.8288 35.5309 43.427 49.8101 47.2314 64.928C48.3834 69.4982 49.5354 74.0826 50.6945 78.7097L51.1425 80.5079L85.9938 61.2249L39.0182 8.05292L38.4066 10.7609ZM99.7253 61.2249L134.548 80.5008L134.996 78.7097C136.262 73.6419 137.506 68.6311 138.744 63.6557C142.128 50.0233 145.328 37.1444 148.777 24.0877C150.05 19.2616 149.254 15.4235 146.111 11.2442L145.065 9.85114L99.7181 61.2178L99.7253 61.2249ZM92.8489 59.4409L122.879 25.3742H62.826L92.8489 59.4409ZM93.0622 18.4371C102.307 18.4371 111.636 18.6219 120.774 18.9844C121.066 18.9986 121.35 18.9986 121.627 18.9986C129.748 18.9986 133.233 14.0588 136.923 8.82765L138.502 6.58875H47.1603L48.7247 8.82054C52.7496 14.5848 56.4545 18.9915 64.3406 18.9915C64.6251 18.9915 64.9095 18.9915 65.2011 18.9773C74.481 18.6148 83.8534 18.43 93.0693 18.43L93.0622 18.4371Z" fill="#A08B54"/>
                                        <path d="M146.652 139.892C145.813 139.892 145.016 139.743 144.454 139.48C138.73 136.807 133.93 134.213 129.791 131.54C128.54 130.73 127.317 128.655 127.174 127.091C126.854 123.466 126.918 119.706 126.975 116.074C126.997 114.653 127.025 113.238 127.025 111.824C127.025 108.661 128.191 107.424 131.164 107.424H131.299C134.101 107.467 137.023 107.481 139.974 107.481C142.925 107.481 146.061 107.46 149.24 107.424H149.382C153.279 107.424 153.343 109.45 153.372 110.317C153.407 111.376 153.165 112.151 152.646 112.691C151.821 113.544 150.371 113.722 149.297 113.722C147.405 113.715 145.549 113.708 143.708 113.708H134.335L134.129 114.887C132.323 125.044 136.22 131.107 145.692 132.905C145.962 132.955 146.253 132.983 146.559 132.983C151.089 132.983 159.743 126.082 159.764 121.441C159.764 120.104 159.764 118.761 159.764 117.425C159.764 115.456 159.757 113.48 159.786 111.511C159.828 108.064 161.393 107.574 162.915 107.538H163.043C164.586 107.538 166.022 108 166.086 111.348V111.732C166.086 111.938 166.093 112.151 166.1 112.357C166.691 131.555 166.527 131.811 148.842 139.494C148.266 139.743 147.469 139.885 146.652 139.885V139.892Z" fill="#A08B54"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_169_124">
                                            <rect width="185.314" height="193" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="card_desc">
                                <p>
                                    Наши водители опытные и заботливые профессионалы, готовые сделать ваше пребывание незабываемым.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>