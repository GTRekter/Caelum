<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START: Modal -->
<div id="alertModal" class="modal fade" role="dialog" data-bind="modalVisible: AlertModalVisible">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="ion-alert"></i> Operazione non disponibile
                </h4>
            </div>
            <div class="modal-body">  
                <p data-bind="text: AlertModalText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

<div id="errorModal" class="modal fade" role="dialog" data-bind="modalVisible: ErrorModalVisible">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="ion-alert"></i> Errore durante l'esecuzione dell'operazione
                </h4>
            </div>
            <div class="modal-body">  
                <p data-bind="text: ErrorModalText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
<!-- END: Modal -->