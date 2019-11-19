            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-<?php print $env["MY_WEB_PANEL_STYLE"] ?>">
                        <div class="panel-heading">
                            <i class="fa fa-wrench fa-fw"></i> Step 2/3: Camera settings
                        </div>
                        <div class="panel-body">
                            <form id="form" method="POST" role="form" action="?step=3">
                                <input type="hidden" name="action" value="configure_camera">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <h3>Camera</h3>
                                                <div class="form-group">
                                                    <label>Resolution</label>
                                                    <select name="CAMERA_RESOLUTION" class="form-control">
                                                        <?php
                                                            $resolutions = array('','352x288','640x480','1024x768','1296x976','1640x1232');
                                                            foreach ($resolutions as $index => $resolution) {
                                                                print "<option value=\"".$resolution."\"";
                                                                if ($config["CAMERA_RESOLUTION"] === $resolution) print " selected";
                                                                print ">$resolution</option>\n";
                                                            }
                                                        ?>
                                                    </select>
                                                    <p class="help-block">Select the resolution for picture/video (<i>default: 640x480</i>)</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rotate</label>
                                                    <select name="CAMERA_ROTATE" class="form-control">
                                                        <?php
                                                            $rotates = array('','0','90','180','270');
                                                            foreach ($rotates as $index => $rotate) {
                                                                print "<option value=\"".$rotate."\"";
                                                                if ($config["CAMERA_ROTATE"] === $rotate) print " selected";
                                                                print ">$rotate</option>\n";
                                                            }
                                                      ?>
                                                    </select>
                                                    <p class="help-block">Rotate image this number of degrees (<i>default: 0</i>)</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Framerate</label>
                                                    <input name="CAMERA_FRAMERATE" class="form-control" value="<?php print $config["CAMERA_FRAMERATE"]; ?>">
                                                    <p class="help-block">Maximum number of frames to be captured per second (<i>default: 2</i>)</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Night Mode</label>
                                                    <select name="CAMERA_NIGHT_MODE" class="form-control">
                                                        <option value="ON" <?php if ($config["CAMERA_NIGHT_MODE"] === "ON") print " selected"?>>On</option>
                                                        <option value="AUTO" <?php if ($config["CAMERA_NIGHT_MODE"] === "AUTO") print " selected"?>>Auto</option>
                                                        <option value="OFF" <?php if ($config["CAMERA_NIGHT_MODE"] === "OFF") print " selected"?>>Off</option>
                                                    </select>
                                                    <p class="help-block">Enter night mode manually or automatically (when the value of a pin changes).</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <h3>IVLI Integration</h3>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type='hidden' value="0" name="IVLI_ENABLE">
                                                        <input value="1" name="IVLI_ENABLE" type="checkbox"<?php if ($config["IVLI_ENABLE"] === "1") print " checked"; ?>>Enable IVLI integration
                                                        <p class="help-block">If checked, upon a motion the image will be further analyzed with an artifical intelligence model to detect cars and their license plates.
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>API key</label>
                                                    <input name="IVLI_TOKEN" class="form-control" value="<?php print $config["IVLI_TOKEN"]?>">
                                                    <p class="help-block">The API key for authenticating against the IVLI service. Click <a target="_blank" href="https://api.ivli.se/">HERE</a> to get your API key.</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Threshold</label>
                                                    <input name="IVLI_THRESHOLD" class="form-control" value="<?php print $config["IVLI_THRESHOLD"]?>">
                                                    <p class="help-block">The probability threshold to trigger an analysis (e.g. 0.8).</p>
                                                </div>
                                                <label>False positives</label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type='hidden' value="0" name="IVLI_KEEP_NOT_FOUND">
                                                        <input value="1" name="IVLI_KEEP_NOT_FOUND" type="checkbox"<?php if ($config["IVLI_KEEP_NOT_FOUND"] === "1") print " checked"; ?>>Keep non-matches
                                                        <p class="help-block">Keep pictures and videos not containing vehicles on the camera. (<i>default: unchecked</i>).
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <button id="button" type="submit" class="pull-right btn btn-primary" onclick='$("#button").addClass("disabled");'>Next</button>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
