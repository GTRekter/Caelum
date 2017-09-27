<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- START: LIST -->
<div class="col-md-12" data-bind="visible: ItemsListVisible">
    <div class="box box-blue">

        <div class="box-header">
            <h3 class="box-title">
                <span data-bind="text: ListTitle"></span>
                <span class="badge" data-bind="text: DogsCount, visible: DogsListVisible"></span>
                <span class="badge" data-bind="text: RacesCount, visible: RacesListVisible"></span>
                <span class="badge" data-bind="text: ColorsCount, visible: ColorsListVisible"></span>
                <span class="badge" data-bind="text: ExhibitionsCount, visible: ExhibitionsListVisible"></span>
            </h3>
            <span class="header-action pull-right" data-bind="click: onClickDelete">
                <i id="delete" class="ion-trash-a pointer"></i>
            </span>
            <span class="header-action pull-right" data-bind="click: onClickAdd">
                <i id="add" class="ion-plus-round pointer"></i>
            </span>
        </div>
        
        <div class="box-body">
            <div class="table-responsive" data-bind="visible: DogsListVisible">
                <!-- ko if: Dogs().length > 0 -->
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Sesso</th>
                            <th>Data di nascita</th>
                            <th>ROI</th>
                            <th>Microchip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ko foreach: Dogs -->
                        <tr>
                            <td>
                                <input type="checkbox" data-bind="checked: IsSelected" />
                            </td>
                            <td data-bind="click: $root.onClickDogDetails">
                                <span data-bind="text: Name"></span>
                            </td>
                            <td data-bind="click: $root.onClickDogDetails">
                                <span data-bind="text: Gender"></span>
                            </td>
                            <td data-bind="click: $root.onClickDogDetails">
                                <span data-bind="text: DateOfBirth"></span>
                            </td>
                            <td data-bind="click: $root.onClickDogDetails">
                                <span data-bind="text: Roi"></span>
                            </td>
                            <td data-bind="click: $root.onClickDogDetails">
                                <span data-bind="text: Microchip"></span>
                            </td>
                        </tr>
                        <!-- /ko -->                       
                    </tbody>
                </table>
                <!-- /ko -->

                <!-- ko if: Dogs().length == 0 -->
                <div class="col-xs-12 p-t-10 p-b-10">
                    <p class="text-center text-muted">
                        Nessun cane presente
                    </p>
                </div>
                <!-- /ko -->
            </div>

            <div class="table-responsive" data-bind="visible: RacesListVisible">
                <!-- ko if: Races().length > 0 -->
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrizione</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ko foreach: Races -->
                        <tr>
                            <td>
                                <input type="checkbox" data-bind="checked: IsSelected" />
                            </td>
                            <td data-bind="click: $root.onClickRaceDetails">
                                <span data-bind="text: Name"></span>
                            </td>
                            <td data-bind="click: $root.onClickRaceDetails">
                                <span data-bind="text: Description"></span>
                            </td>
                        </tr>
                        <!-- /ko -->
                    </tbody>
                </table>
                <!-- /ko -->

                <!-- ko if: Races().length == 0 -->
                <div class="col-xs-12 p-t-10 p-b-10">
                    <p class="text-center text-muted">
                        Nessun razza presente
                    </p>
                </div>
                <!-- /ko -->
            </div>

            <div class="table-responsive" data-bind="visible: ColorsListVisible">
                <!-- ko if: Colors().length > 0 -->
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ko foreach: Colors -->
                        <tr>
                            <td>
                                <input type="checkbox" data-bind="checked: IsSelected" />
                            </td>
                            <td data-bind="click: $root.onClickColorDetails">
                                <span data-bind="text: Name"></span>
                            </td>
                        </tr>
                        <!-- /ko -->
                    </tbody>
                </table>
                <!-- /ko -->

                <!-- ko if: Colors().length == 0 -->
                <div class="col-xs-12 p-t-10 p-b-10">
                    <p class="text-center text-muted">
                        Nessun colore presente
                    </p>
                </div>
                <!-- /ko -->
            </div>

            <div class="table-responsive" data-bind="visible: ExhibitionsListVisible">
                <!-- ko if: Exhibitions.length > 0 -->
                <table class="table table-hover table-striped table-condensed table-product">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrizione</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ko foreach: Exhibitions -->
                        <tr>
                            <td>
                                <input type="checkbox" data-bind="checked: IsSelected" />
                            </td>
                            <span data-bind="text: Name"></span>
                            <span data-bind="text: Description"></span>
                        </tr>
                        <!-- /ko -->
                    </tbody>
                </table>
                <!-- /ko -->

                <!-- ko if: Exhibitions.length == 0 -->
                <div class="col-xs-12 p-t-10 p-b-10">
                    <p class="text-center text-muted">
                        Nessun esibizione presente
                    </p>
                </div>
                <!-- /ko -->
            </div>
        </div>
        
        <div class="box-footer pagination">
            <ul>
                <li>
                    <a href="#" data-bind="click: $root.onClickGoToPreviousPage">Precedente</a>
                </li>
                <!-- ko foreach: Pages -->
                <li data-bind="css: {'active': IsSelected() == true}">
                    <a href="#" data-bind="click: $root.onClickGoToPage, text: Number"></a>
                </li>
                <!-- /ko -->
                <li>
                    <a href="#" data-bind="click: $root.onClickGoToNextPage">Successiva</a>
                </li>
            </ul>
        </div>     
    </div>	
</div>	
<!-- END: LIST -->