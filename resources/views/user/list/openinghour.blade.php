<div class="row">
                                    <div class="col-md-12 m-bottom-20">
                                        <div class="enable247hour custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                            <input type="checkbox" class="custom-control-input" name="enable247hour" value="24*7" id="enable247hour" onchange="valueChanged()"/>
                                            <label for="enable247hour" class="not_empty custom-control-label"> Is this listing open 24 hours
                                                7 days a week? </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row answer">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="bdbh_saturday" class="atbd_day_label form-label">Saturday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[0][day]" value="Saturday" type="hidden">
                                                    <label for="bdbh_saturday" class="not_empty">Start time</label>
                                                    <input name="opening[0][start]" type="time" id="bdbh_saturday" value="" class="form-control directory_field">
                                                </div>
                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_saturday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[0][close]" type="time" id="bdbh_saturday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[0][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="sat_cls">
                                                <label for="sat_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_sunday" class="atbd_day_label form-label">Sunday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[1][day]" value="Sunday" type="hidden">
                                                    <label for="bdbh_sunday" class="not_empty">Start time</label>
                                                    <input name="opening[1][start]" type="time" id="bdbh_sunday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_sunday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[1][close]" type="time" id="bdbh_sunday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[1][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="sun_cls">
                                                <label for="sun_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_monday" class="atbd_day_label form-label">Monday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[2][day]" value="Monday" type="hidden">
                                                    <label for="bdbh_monday" class="not_empty">Start time</label>
                                                    <input name="opening[2][start]" type="time" id="bdbh_monday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_monday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[2][close]" type="time" id="bdbh_monday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[2][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="mon_cls">
                                                <label for="mon_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_tuesday" class="atbd_day_label form-label">Tuesday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[3][day]" value="Tuesday" type="hidden">
                                                    <label  for="bdbh_tuesday" class="not_empty">Start time</label>
                                                    <input name="opening[3][start]" type="time" id="bdbh_tuesday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_tuesday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[3][close]" type="time" id="bdbh_tuesday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[3][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="tue_cls">
                                                <label for="tue_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_wednesday"
                                                   class="atbd_day_label form-label">Wednesday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[4][day]" value="Wednesday" type="hidden">
                                                    <label for="bdbh_wednesday" class="not_empty">Start time</label>
                                                    <input name="opening[4][start]" type="time" id="bdbh_wednesday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_wednesday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[4][close]" type="time" id="bdbh_wednesday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[4][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="wed_cls">
                                                <label for="wed_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_thursday" class="atbd_day_label form-label">Thursday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[5][day]" value="Thursday" type="hidden">
                                                    <label for="bdbh_thursday" class="not_empty">Start time</label>
                                                    <input name="opening[5][start]" type="time" id="bdbh_thursday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_thursday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[5][close]" type="time" id="bdbh_thursday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[5][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="thu_cls">
                                                <label for="thu_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                        <div class="form-group">
                                            <label for="bdbh_friday" class="atbd_day_label form-label">Friday</label>
                                            <div class="row atbd_row_bg">
                                                <div class="col-sm-6">
                                                    <input name="opening[6][day]" value="Friday" type="hidden">
                                                    <label for="bdbh_friday" class="not_empty">Start time</label>
                                                    <input name="opening[6][start]" type="time" id="bdbh_friday" value=""
                                                           class="form-control directory_field">
                                                </div>

                                                <div class="col-sm-6 mt-3 mt-sm-0">
                                                    <label for="bdbh_friday_cls" class="not_empty">Close time</label>
                                                    <input name="opening[6][close]" type="time" id="bdbh_friday_cls" value=""
                                                           class="form-control directory_field">
                                                </div>
                                            </div>

                                            <div class="atbd_mark_as_closed custom-control custom-checkbox checkbox-outline checkbox-outline-primary">
                                                <input name="opening[6][status]" type="checkbox" class="custom-control-input" name="enable247hour" value="0" id="fri_cls">
                                                <label for="fri_cls" class="not_empty custom-control-label"> Mark as Closed </label>
                                            </div>
                                        </div><!-- ends: .form-group -->

                                    </div> <!--ends col-md-6 col-sm-12-->
                                </div> <!--ends .row-->