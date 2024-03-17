 <form id="multiStepForm"  class="multi-step-form" autocomplete="off" action="https://web.whatsapp.com/send">
                <fieldset>
                    <input type="hidden" name="phone" value="{{$settings->get('whatsapp')}}">
                    <input type="hidden" name="text" id="messageInput">
                    <h2 class="fw-bold my-3 text-center">{{__('Select country for your investment')}}</h2>
                    <div class="options">
                        <div class="option" data-value="Turkey">
                            {{__('Turkey')}}
                        </div>
                        <div class="option" data-value="Algeria">
                            {{__('Algeria')}}
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                      <h2 class="fw-bold my-3 text-center">{{__('Choose Your Desired Real Estate Type')}}</h2>
                    <div class="options">
                        <div class="option" data-value="Properties">
                            {{__('Properties')}}
                        </div>
                        <div class="option" data-value="Lands">
                            {{__('Lands')}}
                        </div>
                    </div>
                </fieldset>

            </form>
