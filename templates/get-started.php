    <div id="alerts">
        <div ng-repeat="alert in alerts" ng-hide="alert.hide">
            <div class="right alert card-panel darken-1 white-text z-depth-3 {{alert.color}}">
              <span><i class="material-icons level-icon left">{{alert.icon}}</i> <b>{{alert.msg}}</b></span>
              <span class="right close-help pointer" ng-click="alert_hide($index)"><i class="right material-icons level-icon close-i">close</i></span>
            </div>
            <br>
        </div>
    </div>
    <div class="hide-on-med-and-down spacer-100" ng-show="submitted"></div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3 class="blue-grey-text center text-darken-2" ng-hide="submitted">Get Started!</h3>
                    <p class="flow-text center">
                      Select which services you may need and we'll visit your business for a free consultation.
                    </p>
                    <p class="center">
                      If you not sure what you need, just fill out the 'Contact Info' tab.
                    </p>
                    <h3 class="blue-grey-text center text-darken-2" ng-show="submitted">Thank you!</h3>
                    <div class=progress>
                        <div class="determinate" style="width:{{gs_comp}}%"></div>
                    </div>
                    <ul class=tabs ng-hide=submitted>
                      <li class="col s3 tab"><a ng-click="gs_comp=0;" class="active" href="#it">IT <span class="hide-on-small-only">Services</span></a><li>
                      <li class="col s3 tab"><a ng-click="gs_comp=25;" href="#backup">Backup <span class="hide-on-small-only">Services</span></a></li>
                      <li class="col s3 tab"><a ng-click="gs_comp=50;" href="#telecom">Phone Systems</a></li>
                      <li class="col s3 tab"><a ng-click="gs_comp=75;" href="#contact">Contact <span class="hide-on-small-only">Info</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="row blue-grey card lighten-5">
                <div class="card-content" ng-show="submitted">
                    <div class="spacer-50"></div>
                    <p class="flow-text">Thank you for getting started with Federico Consulting.</p>
                    <br>
                    <p>A sales representative will contact you soon. In the mean time feel free to call or stop by our office with any questions!</p>
                    <br>
                    <p>Here is a summary of your Get-Started request:</p>
                        <table class="bordered striped">
                            <tr>
                                <td with="200px">Name</td>
                                <td>{{mail_confirmation.name}} <span ng-if="mail_confirmation.name.length==0">Not Given</span></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{mail_confirmation.phone}} <span ng-if="mail_confirmation.phone.length==0">Not Given</span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{mail_confirmation.email}} <span ng-if="mail_confirmation.email.length==0">Not Given</span></td>
                            </tr>
                            <tr>
                                <td>Company</td>
                                <td>{{mail_confirmation.company}} {{mail_confirmation.company.length}} <span ng-if="mail_confirmation.company.length==0">Not Given</span></td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>{{mail_confirmation.message}} <span ng-if="mail_confirmation.message.length==0">Not Given</span></td>
                            </tr>
                            <tr>
                                <td>Services Requested</td>
                                <td>
                                    <h5 ng-if=mail_confirmation.it.length>IT Services</h5>
                                    <ul>
                                        <li ng-repeat="service in mail_confirmation.it">{{service}}</li>
                                    </ul>
                                    <h5 ng-if=mail_confirmation.backup.length>Backup Services</h5>
                                    <ul>
                                        <li ng-repeat="service in mail_confirmation.backup">{{service}}</li>
                                    </ul>
                                    <h5 ng-if=mail_confirmation.telecom.length>Phone Systems</h5>
                                    <ul>
                                        <li ng-repeat="service in mail_confirmation.telecom">{{service}}</li>
                                    </ul>
                                    <span ng-if="mail_confirmation.it.length==0 && mail_confirmation.backup.length==0 && mail_confirmation.telecom.length==0">Not Given</span>
                                </td>
                            </tr>
                        </table>
                        <div class=spacer-50></div>
                </div>
                <div class="card-content" ng-hide="submitted">
                    <div class="col s12" ng-repeat="page in objModel.services track by $index" id="{{page.title}}" ng-if="page.title!='contact'">
                        <div class="row" ng-repeat="section in page.options">
                            <h5>{{section.title}}</h5>
                            <div class="col input-field l3 s4" ng-repeat="options in section.options track by $index">
                                <input id="{{options.title.replace(' ','')}}" type=checkbox ng-click="options.value= !options.value" ng-if="section.type=='checkbox'">
                                <input id="{{options.title.replace(' ','')}}" class=with-gap type=radio name="{{section.title.replace(' ','')}}" ng-click="radioDirective(section.options,$index)" ng-if="section.type=='radio'">
                                <label for="{{options.title.replace(' ','')}}">{{options.title}}</label>
                            </div>
                            <br>
                            <div class="spacer-50"></div>
                        </div><a ng-click=openTab($index,1); class="right btn teal waves-effect waves-light" ng-if="$index<3"><i class="right material-icons level-icon">chevron_right</i>Next</a> <a ng-click="openTab($index,-1);" class="left btn teal waves-effect waves-light" ng-if="$index>0"><i class="material-icons level-icon left">chevron_left</i>Back</a>
                        <div class="spacer-50"></div>
                    </div>
                    <form class="col s12" id="contact">
                        <div class="row">
                            <div class="col input-field s6">
                                <input type="text" id="name" class="validate" ng-model="objModel.contact.name" ng-required="true">
                                <label for="name">Name</label>
                            </div>
                            <div class="col input-field s6">
                                <input type="tel" id="phone" class="validate" ng-model="objModel.contact.phone">
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input id="email" class="validate" ng-model="objModel.contact.email" type="email">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                        </div>
                        <div class=row>
                            <div class="col s12 input-field">
                                <input type="text" id="company" class="validate" ng-model="objModel.contact.company">
                                <label for="company">Company</label>
                            </div>
                        </div>
                        <div class=row>
                            <div class="col s12 input-field">
                                <textarea class="materialize-textarea" id="message" ng-model="objModel.contact.message"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="row captcha-container">
                            <div class="col s12">
                                <div class="right" key="'6LcE5RgTAAAAAOgtANRhL1tykUIBF9wIoue2GxVE'" ng-class="{'error': invalid.captcha}" ng-model="objModel.contact.recaptcha" on-success="captcha_success();" theme="light" vc-recaptcha></div>
                            </div>
                        </div><a ng-click="submit(objModel);" class="right btn teal waves-effect waves-light" type="submit"><i class="right material-icons">send</i>Send</a> <a ng-click="openTab(3,-1)" class="left btn teal waves-effect waves-light"><i class="material-icons level-icon left">chevron_left</i>Back</a>
                        <div class="spacer-50"></div>
                    </form>
                </div>
            </div>
            <div class=spacer-50></div>
            <div class="hide-on-med-and-down spacer-100" ng-show=submitted></div>
        </div>
    </div>
