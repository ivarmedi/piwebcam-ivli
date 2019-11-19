            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-<?php print $env["MY_WEB_PANEL_STYLE"] ?>">
                        <div class="panel-heading">
                            <i class="fa fa-check"></i> Setup Complete
                        </div>
                        <div class="panel-body">
                            <h3>Setup complete</h3>
                            <p>You can now start using your camera!</p>
                            <a href="view.php">View the live feed</a>

                            <h3>IVLI Integration</h3>
                            <?php if ($config["IVLI_ENABLE"] == "1") { ?>
                            <p>
                                Since you enabled the IVLI Integration, you will get notified when your camera sees a moving vehicle.
                            </p>
                            <?php } else { ?>
                            <p>
                                To enable the IVLI integration, navigate to the <a href="camera.php">camera settings</a> page.
                            </p>
                            <?php } ?>
                            <p>
                                For more information, see <a target="_blank" href="<?php echo $env["MY_URL"]; ?>"><?php echo $env["MY_URL"]; ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
