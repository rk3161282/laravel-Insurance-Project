<!-- extend the default layout  -->
@extends('layout')

@section('content')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Forms Advanced Plugins</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Forms Advanced Plugins</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Css Switch</h4>
                                        <p class="card-title-desc">Here are a few types of switches. </p>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="font-size-14 mb-3">Example switch</h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <input type="checkbox" id="switch1" switch="none" checked="">
                                                    <label for="switch1" data-on-label="On" data-off-label="Off"></label>
    
                                                    <input type="checkbox" id="switch2" switch="default" checked="">
                                                    <label for="switch2" data-on-label="" data-off-label=""></label>
    
                                                    <input type="checkbox" id="switch3" switch="bool" checked="">
                                                    <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
    
                                                    <input type="checkbox" id="switch6" switch="primary" checked="">
                                                    <label for="switch6" data-on-label="Yes" data-off-label="No"></label>
    
                                                    <input type="checkbox" id="switch4" switch="success" checked="">
                                                    <label for="switch4" data-on-label="Yes" data-off-label="No"></label>
    
                                                    <input type="checkbox" id="switch7" switch="info" checked="">
                                                    <label for="switch7" data-on-label="Yes" data-off-label="No"></label>
    
                                                    <input type="checkbox" id="switch5" switch="warning" checked="">
                                                    <label for="switch5" data-on-label="Yes" data-off-label="No"></label>
    
                                                    <input type="checkbox" id="switch8" switch="danger" checked="">
                                                    <label for="switch8" data-on-label="Yes" data-off-label="No"></label>
    
                                                    <input type="checkbox" id="switch9" switch="dark" checked="">
                                                    <label for="switch9" data-on-label="Yes" data-off-label="No"></label>
                                                </div>
                                            </div>
                                            <!-- end col -->
    
                                            <div class="col-lg-6">
                                                <div class="mt-4 mt-lg-0">
                                                    <h5 class="font-size-14 mb-3">Square switch</h5>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch1" switch="none" checked="">
                                                            <label for="square-switch1" data-on-label="On" data-off-label="Off"></label>
                                                        </div>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch2" switch="info" checked="">
                                                            <label for="square-switch2" data-on-label="Yes" data-off-label="No"></label>
                                                        </div>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch3" switch="bool" checked="">
                                                            <label for="square-switch3" data-on-label="Yes" data-off-label="No"></label>
                                                        </div>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch4" switch="warning" checked="">
                                                            <label for="square-switch4" data-on-label="Yes" data-off-label="No"></label>
                                                        </div>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch5" switch="danger" checked="">
                                                            <label for="square-switch5" data-on-label="Yes" data-off-label="No"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Choices</h4>
                                        <p class="card-title-desc">Choices.js is a lightweight, configurable select box/text input plugin.</p>
                                    </div>
                                    <!-- end card header -->

                                    <div class="card-body">
                                        <div>
                                            <h5 class="font-size-14 mb-3">Single select input Example</h5>

                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Default</label>
                                                        <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" data-trigger="" name="choices-single-default" id="choices-single-default" placeholder="This is a search placeholder" hidden="" tabindex="-1" data-choice="active"><option value="">This is a placeholder</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="null" aria-selected="true">This is a placeholder</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="This is a placeholder" placeholder="This is a search placeholder"><div class="choices__list" role="listbox"><div id="choices--choices-single-default-item-choice-4" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="4" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">This is a placeholder</div><div id="choices--choices-single-default-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="Choice 1" data-select-text="Press to select" data-choice-selectable="">Choice 1</div><div id="choices--choices-single-default-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="">Choice 2</div><div id="choices--choices-single-default-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">Choice 3</div></div></div></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-groups" class="form-label font-size-13 text-muted">Option
                                                            groups</label>
                                                        <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" data-trigger="" name="choices-single-groups" id="choices-single-groups" hidden="" tabindex="-1" data-choice="active"><option value="">Choose a city</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="null" aria-selected="true">Choose a city</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Choose a city" placeholder="This is a search placeholder"><div class="choices__list" role="listbox"><div id="choices--choices-single-groups-item-choice-1" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Choose a city</div><div class="choices__group " role="group" data-group="" data-id="248831939033" data-value="CA"><div class="choices__heading">CA</div></div><div id="choices--choices-single-groups-item-choice-17" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="17" data-value="Montreal" data-select-text="Press to select" data-choice-selectable="">Montreal</div><div id="choices--choices-single-groups-item-choice-18" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="18" data-value="Toronto" data-select-text="Press to select" data-choice-selectable="">Toronto</div><div id="choices--choices-single-groups-item-choice-19" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="19" data-value="Vancouver" data-select-text="Press to select" data-choice-selectable="">Vancouver</div><div class="choices__group " role="group" data-group="" data-id="329259362859" data-value="FR"><div class="choices__heading">FR</div></div><div id="choices--choices-single-groups-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="6" data-value="Lyon" data-select-text="Press to select" data-choice-selectable="">Lyon</div><div id="choices--choices-single-groups-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="7" data-value="Marseille" data-select-text="Press to select" data-choice-selectable="">Marseille</div><div id="choices--choices-single-groups-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="5" data-value="Paris" data-select-text="Press to select" data-choice-selectable="">Paris</div><div class="choices__group " role="group" data-group="" data-id="987971134968" data-value="SP"><div class="choices__heading">SP</div></div><div id="choices--choices-single-groups-item-choice-15" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="15" data-value="Barcelona" data-select-text="Press to select" data-choice-selectable="">Barcelona</div><div id="choices--choices-single-groups-item-choice-14" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="14" data-value="Madrid" data-select-text="Press to select" data-choice-selectable="">Madrid</div><div id="choices--choices-single-groups-item-choice-16" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="16" data-value="Malaga" data-select-text="Press to select" data-choice-selectable="">Malaga</div><div class="choices__group " role="group" data-group="" data-id="445633763011" data-value="UK"><div class="choices__heading">UK</div></div><div id="choices--choices-single-groups-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="4" data-value="Liverpool" data-select-text="Press to select" data-choice-selectable="">Liverpool</div><div id="choices--choices-single-groups-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="2" data-value="London" data-select-text="Press to select" data-choice-selectable="">London</div><div id="choices--choices-single-groups-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="3" data-value="Manchester" data-select-text="Press to select" data-choice-selectable="">Manchester</div><div class="choices__group " role="group" data-group="" data-id="1005793798641" data-value="US"><div class="choices__heading">US</div></div><div id="choices--choices-single-groups-item-choice-13" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="13" data-value="Michigan" data-select-text="Press to select" data-choice-selectable="">Michigan</div><div id="choices--choices-single-groups-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="11" data-value="New York" data-select-text="Press to select" data-choice-selectable="">New York</div><div id="choices--choices-single-groups-item-choice-12" class="choices__item choices__item--choice choices__item--disabled" role="treeitem" data-choice="" data-id="12" data-value="Washington" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Washington</div></div></div></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-no-search" class="form-label font-size-13 text-muted">Options added
                                                            via config with no search</label>
                                                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-single-no-search" id="choices-single-no-search" hidden="" tabindex="-1" data-choice="active"><option value="Six">Label Six</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="Six" data-custom-properties="null" aria-selected="true" data-deletable="">Label Six<button type="button" class="choices__button" aria-label="Remove item: 'Six'" data-button="">Remove item</button></div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-single-no-search-item-choice-6" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="6" data-value="Five" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Label Five</div><div id="choices--choices-single-no-search-item-choice-5" class="choices__item choices__item--choice choices__item--disabled" role="option" data-choice="" data-id="5" data-value="Four" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Label Four</div><div id="choices--choices-single-no-search-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="One" data-select-text="Press to select" data-choice-selectable="">Label One</div><div id="choices--choices-single-no-search-item-choice-7" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Six" data-select-text="Press to select" data-choice-selectable="">Label Six</div><div id="choices--choices-single-no-search-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Three" data-select-text="Press to select" data-choice-selectable="">Label Three</div><div id="choices--choices-single-no-search-item-choice-3" class="choices__item choices__item--choice choices__item--disabled" role="option" data-choice="" data-id="3" data-value="Two" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Label Two</div><div id="choices--choices-single-no-search-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="0" data-select-text="Press to select" data-choice-selectable="">Zero</div></div></div></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-no-sorting" class="form-label font-size-13 text-muted">Options added
                                                            via config with no search</label>
                                                        <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-single-no-sorting" id="choices-single-no-sorting" hidden="" tabindex="-1" data-choice="active"><option value="Madrid">Madrid</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Madrid" data-custom-properties="null" aria-selected="true">Madrid</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder=""><div class="choices__list" role="listbox"><div id="choices--choices-single-no-sorting-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Madrid" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Madrid</div><div id="choices--choices-single-no-sorting-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Toronto" data-select-text="Press to select" data-choice-selectable="">Toronto</div><div id="choices--choices-single-no-sorting-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Vancouver" data-select-text="Press to select" data-choice-selectable="">Vancouver</div><div id="choices--choices-single-no-sorting-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="London" data-select-text="Press to select" data-choice-selectable="">London</div><div id="choices--choices-single-no-sorting-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Manchester" data-select-text="Press to select" data-choice-selectable="">Manchester</div><div id="choices--choices-single-no-sorting-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Liverpool" data-select-text="Press to select" data-choice-selectable="">Liverpool</div><div id="choices--choices-single-no-sorting-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Paris" data-select-text="Press to select" data-choice-selectable="">Paris</div><div id="choices--choices-single-no-sorting-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="Malaga" data-select-text="Press to select" data-choice-selectable="">Malaga</div><div id="choices--choices-single-no-sorting-item-choice-9" class="choices__item choices__item--choice choices__item--disabled" role="option" data-choice="" data-id="9" data-value="Washington" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Washington</div><div id="choices--choices-single-no-sorting-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="Lyon" data-select-text="Press to select" data-choice-selectable="">Lyon</div><div id="choices--choices-single-no-sorting-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="Marseille" data-select-text="Press to select" data-choice-selectable="">Marseille</div><div id="choices--choices-single-no-sorting-item-choice-12" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="12" data-value="Hamburg" data-select-text="Press to select" data-choice-selectable="">Hamburg</div><div id="choices--choices-single-no-sorting-item-choice-13" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="13" data-value="Munich" data-select-text="Press to select" data-choice-selectable="">Munich</div><div id="choices--choices-single-no-sorting-item-choice-14" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="14" data-value="Barcelona" data-select-text="Press to select" data-choice-selectable="">Barcelona</div><div id="choices--choices-single-no-sorting-item-choice-15" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="15" data-value="Berlin" data-select-text="Press to select" data-choice-selectable="">Berlin</div><div id="choices--choices-single-no-sorting-item-choice-16" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="16" data-value="Montreal" data-select-text="Press to select" data-choice-selectable="">Montreal</div><div id="choices--choices-single-no-sorting-item-choice-17" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="17" data-value="New York" data-select-text="Press to select" data-choice-selectable="">New York</div><div id="choices--choices-single-no-sorting-item-choice-18" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="18" data-value="Michigan" data-select-text="Press to select" data-choice-selectable="">Michigan</div></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- Single select input Example -->


                                        <div class="mt-4">
                                            <h5 class="font-size-14 mb-3">Multiple select input</h5>
    
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-multiple-default" class="form-label font-size-13 text-muted">Default</label>
                                                        <div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" data-trigger="" name="choices-multiple-default" id="choices-multiple-default" placeholder="This is a placeholder" multiple="" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Choice 1</option></select><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">Choice 1</div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" aria-multiselectable="true" role="listbox"><div id="choices--choices-multiple-default-item-choice-2" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="2" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Choice 2</div><div id="choices--choices-multiple-default-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">Choice 3</div><div id="choices--choices-multiple-default-item-choice-4" class="choices__item choices__item--choice choices__item--disabled" role="option" data-choice="" data-id="4" data-value="Choice 4" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Choice 4</div></div></div></div>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">With
                                                            remove button</label>
                                                        <div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-multiple-remove-button" id="choices-multiple-remove-button" placeholder="This is a placeholder" multiple="" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Choice 1</option></select><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true" data-deletable="">Choice 1<button type="button" class="choices__button" aria-label="Remove item: 'Choice 1'" data-button="">Remove item</button></div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" aria-multiselectable="true" role="listbox"><div id="choices--choices-multiple-remove-button-item-choice-2" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="2" data-value="Choice 2" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Choice 2</div><div id="choices--choices-multiple-remove-button-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 3" data-select-text="Press to select" data-choice-selectable="">Choice 3</div><div id="choices--choices-multiple-remove-button-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 4" data-select-text="Press to select" data-choice-selectable="">Choice 4</div></div></div></div>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-multiple-groups" class="form-label font-size-13 text-muted">Option
                                                            groups</label>
                                                        <div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-multiple-groups" id="choices-multiple-groups" placeholder="This is a placeholder" multiple="" hidden="" tabindex="-1" data-choice="active"></select><div class="choices__list choices__list--multiple"></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Choose a city" placeholder="Choose a city" style="min-width: 14ch; width: 1ch;"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" aria-multiselectable="true" role="listbox"><div class="choices__group " role="group" data-group="" data-id="1073349128809" data-value="CA"><div class="choices__heading">CA</div></div><div id="choices--choices-multiple-groups-item-choice-17" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="treeitem" data-choice="" data-id="17" data-value="Montreal" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Montreal</div><div id="choices--choices-multiple-groups-item-choice-18" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="18" data-value="Toronto" data-select-text="Press to select" data-choice-selectable="">Toronto</div><div id="choices--choices-multiple-groups-item-choice-19" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="19" data-value="Vancouver" data-select-text="Press to select" data-choice-selectable="">Vancouver</div><div class="choices__group " role="group" data-group="" data-id="61806923215" data-value="FR"><div class="choices__heading">FR</div></div><div id="choices--choices-multiple-groups-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="6" data-value="Lyon" data-select-text="Press to select" data-choice-selectable="">Lyon</div><div id="choices--choices-multiple-groups-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="7" data-value="Marseille" data-select-text="Press to select" data-choice-selectable="">Marseille</div><div id="choices--choices-multiple-groups-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="5" data-value="Paris" data-select-text="Press to select" data-choice-selectable="">Paris</div><div class="choices__group " role="group" data-group="" data-id="401783710379" data-value="SP"><div class="choices__heading">SP</div></div><div id="choices--choices-multiple-groups-item-choice-15" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="15" data-value="Barcelona" data-select-text="Press to select" data-choice-selectable="">Barcelona</div><div id="choices--choices-multiple-groups-item-choice-14" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="14" data-value="Madrid" data-select-text="Press to select" data-choice-selectable="">Madrid</div><div id="choices--choices-multiple-groups-item-choice-16" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="16" data-value="Malaga" data-select-text="Press to select" data-choice-selectable="">Malaga</div><div class="choices__group " role="group" data-group="" data-id="752678241276" data-value="UK"><div class="choices__heading">UK</div></div><div id="choices--choices-multiple-groups-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="4" data-value="Liverpool" data-select-text="Press to select" data-choice-selectable="">Liverpool</div><div id="choices--choices-multiple-groups-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="2" data-value="London" data-select-text="Press to select" data-choice-selectable="">London</div><div id="choices--choices-multiple-groups-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="3" data-value="Manchester" data-select-text="Press to select" data-choice-selectable="">Manchester</div><div class="choices__group " role="group" data-group="" data-id="25156839779" data-value="US"><div class="choices__heading">US</div></div><div id="choices--choices-multiple-groups-item-choice-13" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="13" data-value="Michigan" data-select-text="Press to select" data-choice-selectable="">Michigan</div><div id="choices--choices-multiple-groups-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="treeitem" data-choice="" data-id="11" data-value="New York" data-select-text="Press to select" data-choice-selectable="">New York</div><div id="choices--choices-multiple-groups-item-choice-12" class="choices__item choices__item--choice choices__item--disabled" role="treeitem" data-choice="" data-id="12" data-value="Washington" data-select-text="Press to select" data-choice-disabled="" aria-disabled="true">Washington</div></div></div></div>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- multi select input Example -->

                                        <div class="mt-4">
                                            <h5 class="font-size-14 mb-3">Text inputs</h5>
    
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-text-remove-button" class="form-label font-size-13 text-muted">Limited to 5
                                                            values with remove button</label>
                                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><input class="form-control choices__input" id="choices-text-remove-button" type="text" value="Task-1,Task-2" placeholder="Enter something" hidden="" tabindex="-1" data-choice="active"><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Task-1" data-custom-properties="null" aria-selected="true" data-deletable="">Task-1<button type="button" class="choices__button" aria-label="Remove item: 'Task-1'" data-button="">Remove item</button></div><div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="Task-2" data-custom-properties="null" aria-selected="true" data-deletable="">Task-2<button type="button" class="choices__button" aria-label="Remove item: 'Task-2'" data-button="">Remove item</button></div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"></div></div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
    
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-text-unique-values" class="form-label font-size-13 text-muted">Unique values
                                                            only, no pasting</label>
                                                        <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><input class="form-control choices__input" id="choices-text-unique-values" type="text" value="Project-A,Project-B" placeholder="This is a placeholder" hidden="" tabindex="-1" data-choice="active"><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Project-A" data-custom-properties="null" aria-selected="true">Project-A</div><div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="Project-B" data-custom-properties="null" aria-selected="true">Project-B</div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"></div></div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
    
                                            <div>
                                                <label for="choices-text-disabled" class="form-label font-size-13 text-muted">Disabled</label>
                                                <div class="choices is-disabled" data-type="text" aria-haspopup="true" aria-expanded="false" aria-disabled="true"><div class="choices__inner"><input class="form-control choices__input" id="choices-text-disabled" type="text" value="josh@joshuajohnson.co.uk,joe@bloggs.co.uk" placeholder="This is a placeholder" hidden="" tabindex="-1" data-choice="active" disabled=""><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="josh@joshuajohnson.co.uk" data-custom-properties="null" aria-selected="true">josh@joshuajohnson.co.uk</div><div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="joe@bloggs.co.uk" data-custom-properties="null" aria-selected="true">joe@bloggs.co.uk</div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" disabled=""></div><div class="choices__list choices__list--dropdown" aria-expanded="false"></div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Colorpicker</h4>
                                        <p class="card-title-desc">Flat, Simple, Hackable Color-Picker.</p>
                                    </div>
                                    <div class="card-body">
    
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14">Classic Demo</h5>
                                                        <div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color:rgba(74, 79, 234, 1);"></button>

        
      </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14">Monolith Demo</h5>
                                                        <div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color:rgba(39, 187, 232, 1);"></button>

        
      </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14">Nano Demo</h5>
                                                        <div class="pickr">

        <button type="button" class="pcr-button" role="button" aria-label="toggle color picker dialog" style="--pcr-color:rgba(247, 204, 83, 1);"></button>

        
      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Datepicker</h4>
                                        <p class="card-title-desc">flatpickr is a lightweight and powerful datetime picker.</p>
                                    </div>
                                    <div class="card-body">
    
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Basic</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-basic" readonly="readonly">
                                                    </div>
    
                                                    <div class="mb-3">
                                                        <label class="form-label">DateTime</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-datetime" readonly="readonly">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Human-friendly Dates</label>
                                                        <input type="hidden" class="form-control flatpickr-input" id="datepicker-humanfd" value="2022-02-09"><input class="form-control flatpickr-input form-control input" placeholder="" tabindex="0" type="text" readonly="readonly">
                                                    </div>
    
                                                    <div class="mb-3">
                                                        <label class="form-label">MinDate and MaxDate</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-minmax" readonly="readonly">
                                                    </div>
    
                                                    <div class="mb-3">
                                                        <label class="form-label">Disabling dates</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-disable" readonly="readonly">
                                                    </div>
    
                                                    <div class="mb-3">
                                                        <label class="form-label">Selecting multiple dates</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-multiple" readonly="readonly">
                                                    </div>
    
                                                    <div>
                                                        <label class="form-label">Range</label>
                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-range" readonly="readonly">
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-6">
                                                    <div class="mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label class="form-label">Timepicker</label>
                                                            <input type="text" class="form-control flatpickr-input" id="datepicker-timepicker" readonly="readonly">
                                                        </div>
        
                                                        <div>
                                                            <label class="form-label">Inline Date Picker Demo</label>
                                                            <input type="text" class="form-control flatpickr-input" id="datepicker-inline" readonly="readonly"><div class="flatpickr-calendar animate inline" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="January 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="January 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="February 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="February 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="February 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="February 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="February 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="February 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="February 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="February 8, 2022" tabindex="-1">8</span><span class="flatpickr-day today selected" aria-label="February 9, 2022" aria-current="date" tabindex="-1">9</span><span class="flatpickr-day " aria-label="February 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="February 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="February 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="February 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="February 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="February 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="February 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="February 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="February 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="February 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="February 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="February 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="February 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="February 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="February 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="February 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="February 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="February 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="February 28, 2022" tabindex="-1">28</span><span class="flatpickr-day nextMonthDay" aria-label="March 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="March 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="March 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="March 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="March 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="March 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="March 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="March 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="March 9, 2022" tabindex="-1">9</span><span class="flatpickr-day nextMonthDay" aria-label="March 10, 2022" tabindex="-1">10</span><span class="flatpickr-day nextMonthDay" aria-label="March 11, 2022" tabindex="-1">11</span><span class="flatpickr-day nextMonthDay" aria-label="March 12, 2022" tabindex="-1">12</span></div></div></div></div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>


@endsection