    <div class="F_form  F_form_order_mini" style="display: none" id="reserve" data-token="{{ csrf_token() }}">
        @honeypot
        <x-forms.loader class="br_12"/>
        @include('include.modals.modal.responce.responce')
        <div class="F_form__body new__temp">
            <div class="new__temp_top">

                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span class="res_title__js"></span></div>
                        <div class="F_h2" ><span class="res_subtitle__js">{{__('Оставьте заявку и мы Вам перезвоним')}}</span></div>
                    </div>
                </div>



            </div><!--.new__temp_top-->


            <div class="new__temp_middle">
                <div class="modal_product">
                    <div class="modal_left">
                        <img src="" class="res_img__js" alt="product" width="130" height="130"/>
<div class="res_price res_price__js"></div>
                    </div>
                    <div class="modal_right">
                        <div class="alax_inputs">
                            <div class="text_input">
                                <x-forms.text-input_fromLabel
                                    type="text"
                                    name="name"
                                    placeholder="Имя"
                                    value="{{ old('name')?:'' }}"
                                    required="true"
                                    class="input name"
                                />
                                <x-forms.error class="error_name"/>


                            </div>

                            <div class="text_input">
                                <x-forms.text-input_fromLabel
                                    type="text"
                                    name="phone"
                                    placeholder="Телефон"
                                    value="{{ old('phone')?:'' }}"
                                    required="true"
                                    class="input phone"
                                />
                                <x-forms.error class="error_phone"/>

                            </div>

                            <div class="text_input">
                                <x-forms.text-input_fromLabel
                                    type="email"
                                    name="email"
                                    placeholder="Email"
                                    value="{{ old('email')?:'' }}"
                                    required="true"
                                    class="input email"
                                />
                                <x-forms.error class="error_email"/>

                            </div>


                            <div class="text_input pad_t26_important">
                                <x-forms.text-input
                                    type="hidden"
                                    name="crm"
                                    value="crm"
                                />
                                <x-forms.button_call_me class="button_normal reserve__js">
                                    {{__('Отправить заявку')}}
                                </x-forms.button_call_me>
                            </div>
                        </div><!--.alax_inputs-->
                    </div>
                </div>


            </div><!--.new__temp_middle-->
        </div><!--.F_form__body-->
    </div><!--.F_form-->

