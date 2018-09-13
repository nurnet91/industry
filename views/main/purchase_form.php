<form class="ads-form  ads-form--js">
    <div class="container">
        <div class="ads-form__title  content-text">
            <h2>Форма объявления о продаже оборудования</h2>
        </div>
        <div class="ads-form-steps">
            <div class="ads-form-steps__step  ads-form-steps__step--js" id="step1">
                <div class="ads-form__title  content-text">
                    <h3>Выберете тип оборудования:</h3>
                </div>
                <div class="ads-form-steps__main-list  row">
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Направление</h3>
                        <select class="ads-form-steps__select  select">
                            <option data-display="Выберите из списка">Выберите из списка</option>
                            <option>направление 1</option>
                            <option>направление 2</option>
                            <option>направление 3</option>
                        </select>
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Тема</h3>
                        <select class="ads-form-steps__select  select">
                            <option data-display="Выберите из списка">Выберите из списка</option>
                            <option>направление 1</option>
                            <option>направление 2</option>
                            <option>направление 3</option>
                        </select>
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Тип оборудования</h3>
                        <select class="ads-form-steps__select  select">
                            <option data-display="Выберите из списка">Выберите из списка</option>
                            <option>направление 1</option>
                            <option>направление 2</option>
                            <option>направление 3</option>
                        </select>
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Производитель</h3>
                        <select class="ads-form-steps__select  select">
                            <option data-display="Выберите из списка">Выберите из списка</option>
                            <option>направление 1</option>
                            <option>направление 2</option>
                            <option>направление 3</option>
                        </select>
                    </div>
                </div>
                <div class="ads-form-steps__descr  text-size-medium  text--opacity">Пожалуйста, заполняйте поля последовательно. Поля, обозначенные *, обязательны для заполнения.</div>
            </div>
            <div class="ads-form-steps__step  ads-form-steps__step--js" id="step2">
                <div class="ads-form__title  content-text">
                    <h3>Укажите информацию по модели оборудования и его состоянию</h3>
                </div>
                <div class="ads-form-steps__main-list  row">
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Модель</h3>
                        <input type="text" placeholder="Впишите сюда модель" class="">
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Год выпуска</h3>
                        <select class="ads-form-steps__select  select">
                            <option data-display="Выберите из списка">2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                        </select>
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col">
                        <h3>Наработка</h3>
                        <input type="text" placeholder="Наработка в часах" class="">
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  ads-form-steps__col--content--not--imported  content-text  col">
                        <h3>Местонахождение</h3>
                        <!-- <select class="ads-form-steps__select  select">
                            <option data-display="Где оно в данный момент?">Где оно в данный момент?</option>
                            <option value="1">В цеху</option>
                            <option value="2">На складе</option>
                            <option value="3">У производителя</option>
                        </select> -->
                        <div class="input-wrap">
                            <input type="text" placeholder="Где оно в данный момент" class="input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ads-form-steps__step  ads-form-steps__step--js" id="step3">
                <div class="ads-form__title  content-text">
                    <h3>Укажите условия продажи</h3>
                </div>
                <div class="ads-form-steps__main-list  row">
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-3">
                        <h3>Цена</h3>
                        <input type="text" placeholder="Цена в рублях" class="">
                    </div>
                    <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-3">
                        <h3>Гарантия</h3>
                        <input type="text" placeholder="Гарантия в месяцах" class="">
                    </div>
                    <div class="ads-form-steps__col  col-lg-6">
                        <div class="ads-form-steps__col--content content-text">
                            <h3>Описание</h3>
                        </div>
                        <div class="row  justify-content-between">
                            <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-8">
                                <textarea class="ads-form-steps__textarea  textarea" placeholder="Описание, комплектация оборудования, а также дополнительная информация, которая может заинтересовать потенциальных клиентов"></textarea>
                            </div>
                            <div class="ads-form-steps__col  ads-form-steps__col--upload-list-wrap  col-lg-4">
                                <ul id="uploadImagesList" class="ads-form-steps__upload-imgs-list">
                                    <li class="item template  ads-form-steps__upload-img-item  ads-form-steps__upload-img-item--main-default">
													<span class="ads-form-steps__upload-img-wrap  img-wrap">
														<img src="/images/" alt="">
														<a href="#">Главная</a>
													</span>
                                        <span class="delete-link" title="Удалить"></span>
                                    </li>
                                </ul>
                                <label class="ads-form-steps__file-label">
                                    <input type="file" id="addImages" class="ads-form-steps__file" multiple="">
                                    <i class="ads-form-steps__fa  fa fa-plus-square-o" aria-hidden="true"></i>
                                </label>
                                <input type="hidden" name="azaza" value="zazaza">
                                <div class="clear"></div>
                                <div class="text text--opacity">Максимум - 5 фото. Отметьте самое лучшее, как «Главное».</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ads-form-steps__step  ads-form-steps__step--js" id="step4">
                <div class="ads-form__title  content-text">
                    <h3>Укажите контактные данные для связи по данному объявлению:</h3>
                </div>
                <div class="ads-form-steps__main-list  row">
                    <div class="ads-form-steps__col-item  ads-form-steps__col-item--first  col-lg-7">
                        <div class="row">
                            <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-6">
                                <h3>Компания</h3>
                                <div class="ads-form-step__text-file-wrap">
                                    <input type="text" placeholder="Название компании" class="">
                                    <label class="ads-form-step__file-label">
                                        <input type="file" class="ads-form-step__file">
                                        <i class="ads-form-step__upload-fa  fa fa-upload" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <p class="ads-form-steps__txt  text  text--opacity">Также Вы можете загрузить логотип</p>
                            </div>
                            <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-6">
                                <h3>ФИО</h3>
                                <input type="text" placeholder="" class="">
                            </div>
                            <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-6">
                                <h3>Телефон</h3>
                                <input type="text" placeholder="" class="">
                                <p class="ads-form-steps__txt  text  text--opacity">Пожалуйста, введите в формате код страны - код региона - номер. Например: +7-495-123-45-67</p>
                            </div>
                            <div class="ads-form-steps__col  ads-form-steps__col--content  content-text  col-lg-6">
                                <h3>Email</h3>
                                <input type="text" placeholder="" class="">
                            </div>
                        </div>
                    </div>
                    <div class="ads-form-steps__col-item  col-lg-5">
                        <div class="ads-form-steps__col  ads-form-steps__col--content  ads-form-steps__col--content--not--imported  content-text">
                            <h3>Дополнительно</h3>
                            <textarea class="ads-form-step__textarea  ads-form-step__textarea--large  textarea" placeholder="Дополнительные способы связи (второй телефон, скайп, мессенджеры и пр.)"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ads-form__status-bar  flex  align-items-center">
            <div class="ads-form__indicator  ads-step-indicator  ads-step-indicator--js">
                <ul>
                    <li class="current">
                        <div class="ads-step-indicator__box">
                            <div class="ads-step-indicator__value">1</div>
                            <div class="ads-step-indicator__txt  text">Тип оборудования</div>
                        </div>
                    </li>
                    <li class="">
                        <div class="ads-step-indicator__box">
                            <div class="ads-step-indicator__value">2</div>
                            <div class="ads-step-indicator__txt  text">Модель и состояние</div>
                        </div>
                    </li>
                    <li>
                        <div class="ads-step-indicator__box">
                            <div class="ads-step-indicator__value">3</div>
                            <div class="ads-step-indicator__txt  text">Условия продажи</div>
                        </div>
                    </li>
                    <li>
                        <div class="ads-step-indicator__box">
                            <div class="ads-step-indicator__value">4</div>
                            <div class="ads-step-indicator__txt  text">Контакты</div>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="#" class="ads-form__link-step-back  ads-form__link-step-back--js"><span>Назад</span></a>
            <a href="#" class="ads-form__link-step-next  ads-form__link-step-next--js  button  button_blue"><span>Далее</span></a>
            <input type="submit" value="Сохранить и отправить" class="ads-form__submit  ads-form__submit--js  button  button_blue">
        </div>
    </div>
</form>
		