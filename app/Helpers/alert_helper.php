<?php
function alertMessage($color = "success")
{
    if (NULL !== session()->getFlashdata('message')) { ?>
        <div class="alert alert-<?= $color ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php }
}

function error_message($error_message, $color = 'danger')
{
    if ($error_message) { ?>
        <div class="alert alert-<?= $color ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <?= $error_message ?>
        </div>
<?php
    }
}
?>