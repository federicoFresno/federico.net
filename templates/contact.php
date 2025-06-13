    <div id="alerts">
        <div ng-repeat="alert in alerts" ng-hide="alert.hide">
            <div class="card-panel {{alert.color}} darken-1 white-text right z-depth-3 alert">
                <span><i class="material-icons left level-icon">{{alert.icon}}</i> <b>{{alert.msg}}</b></span>
                <span class="pointer right close-help" ng-click="alert_hide($index)"><i class="material-icons level-icon right close-i">close</i></span>
            </div>
            <br>
        </div>
    </div>
    <div class="spacer-50 hide-on-small-only"></div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 l4">
                    <div class="card">
                        <div class="card-content"> <span class="card-title">Federico Consulting</span>
                            <table>
                                <tbody>
                                    <tr>
                                        <td width="50"><i class="material-icons">phone</i></td>
                                        <td><a href="tel:559-224-5922" class="red-text text-darken-2">559-224-5922</td>
                  </tr>
                  <tr><td><i class="material-icons">home</i></td><td>333 W Shaw Ave #104<br>Fresno, CA 93704</td>
                  </tr>
                  <tr><td><i class="material-icons">mail</i></td><td><a href="mailto:sales@federico.net" class="red-text text-darken-2">sales@federico.net</a></td>
                                    </tr>
                                    <tr>
                                        <td><i class="material-icons">sentiment_very_satisfied</i></td>
                                        <td>
                                            <a href="https://www.facebook.com/FedericoConsulting"><img class="social-icons" src="/img/icons/facebook.jpg"></a>
                                            <a href="https://www.twitter.com/fci"><img class="social-icons" src="img/icons/twitter.jpg"></a>
                                            <a href="http://www.bbb.org/central-california/business-reviews/computers-sys-designers-and-consult/federico-consulting-in-fresno-ca-21002652#bbblogo"><img class="social-icons" src="img/icons/bbb.jpg"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col s12 l8">
                    <div class="iframe-rwd">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.429344319034!2d-119.79983988470987!3d36.80823037994691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8094678c320ab485%3A0xbbcd35c8e14d6116!2sFederico+Consulting+Inc.!5e0!3m2!1sen!2sus!4v1458533290368"
                            width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 l4">
                    <div class="card blue-grey darken-3">
                        <div class="card-image"> <img src="img/office/corner.jpg"> </div>
                        <div class="card-content"> <span class="card-title center-align white-text">S.W. Corner of <b>Shaw &amp; College</b></span> </div>
                    </div>
                </div>
                <div class="col s12 l4">
                    <div class="card blue-grey darken-3">
                        <div class="card-image"> <img src="img/office/front.jpg"> </div>
                        <div class="card-content"> <span class="card-title center-align white-text">Front Entrance</span> </div>
                    </div>
                </div>
                <div class="col s12 l4">
                    <div class="card blue-grey darken-3">
                        <div class="card-image"> <img src="img/office/parking-lot.jpg"> </div>
                        <div class="card-content"> <span class="card-title center-align white-text">Parking Lot</span> </div>
                    </div>
                </div>
            </div>
            <div id="confirmation_hook"></div>
        </div>
    </div>

    <div class="section  blue-grey lighten-5 p-t-0">
        <img src="img/hex-bottom.png" class="hex-border">
        <div class="container">
            <div class="row">
                <div class="col s12" id="confirmation" ng-show="submitted">
                    <div class="spacer-50"></div>
                    <p class="flow-text">Thank you for contacting Federico Consulting.</p>
                    <br>
                    <p>A representative will respond soon. In the mean time feel free to call or stop by our office with any questions or concers.</p>
                    <p>Here is a summary of your request: </p>
                    <table class="bordered striped">
                        <tbody>
                            <tr>
                                <td with="200px">
                                    Name
                                </td>
                                <td>
                                    {{mail_confirmation.name}}
                                    <span ng-if="mail_confirmation.name.length==0">Not Given</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone Number
                                </td>
                                <td>
                                    {{mail_confirmation.phone}}
                                    <span ng-if="mail_confirmation.phone.length==0">Not Given</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    {{mail_confirmation.email}}
                                    <span ng-if="mail_confirmation.email.length==0">Not Given</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Company
                                </td>
                                <td>
                                    {{mail_confirmation.company}}
                                    <span ng-if="mail_confirmation.company.length==0">Not Given</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Message
                                </td>
                                <td>
                                    {{mail_confirmation.message}}
                                    <span ng-if="mail_confirmation.message.length==0">Not Given</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Services Requested
                                </td>
                                <td>
                                    <ul>
                                        <li ng-repeat="interest in mail_confirmation.interests">{{interest}}</li>
                                    </ul>
                                    <span ng-if="mail_confirmation.interests.length == 0">Not Given</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="spacer-50"></div>
                </div>
                <form class="col s12" action="?" method="POST" ng-hide="submitted">
                    <h3 class="blue-grey-text text-darken-2 center">Send us a Message <i class="material-icons">mail</i></h3>
                    <div class="spacer-50"></div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="name" type="text" class="validate" ng-model="contact_obj.contact.name">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone" type="text" class="validate" ng-model="contact_obj.contact.phone" ui-mask="(999) 999-9999" ui-mask-placeholder ui-mask-placeholder-char="#">
                            <label for="phone">Phone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" ng-model="contact_obj.contact.email">
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="company" type="text" class="validate" ng-model="contact_obj.contact.company">
                            <label for="company">Company</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label>I'm interested in: </label>
                            <br> </div>
                        <div class="input-field col s4 l3" ng-repeat="interest in contact_obj.contact.interests">
                            <input type="checkbox" id="interest_{{$index}}" ng-model="interest.value" />
                            <label for="interest_{{$index}}">{{interest.title}}</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="message" class="materialize-textarea" ng-model="contact_obj.contact.message"></textarea>
                            <label for="message">Message</label>
                        </div>
                    </div>
                    <div class="row captcha-container">
                        <div class="col s12">
                            <div class="right" vc-recaptcha ng-model="contact_obj.contact.recaptcha" theme="light" key="'6LcE5RgTAAAAAOgtANRhL1tykUIBF9wIoue2GxVE'" on-success="captcha_success();"></div>
                        </div>
                    </div>
                    <br/><a class="waves-effect waves-light red darken-3 btn right" type="submit" ng-click="submit(contact_obj);" href="#confirmation_hook"><i class="material-icons right">send</i>Send</a>
                </form>
            </div>
        </div>
    </div>
