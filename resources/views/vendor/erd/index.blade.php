<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover"/>
    <meta name="description"
          content="Interactive entity-relationship diagram or data model diagram implemented by GoJS in JavaScript for HTML."/>
    <link href="{{ asset('demo8/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('demo8/plugins/global/plugins.bundle.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('demo8/plugins/global/plugins-custom.bundle.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('demo8/css/style.bundle.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gojs/2.1.46/go.js"></script>
    <script src="https://unpkg.com/gojs@2.1.47/extensions/Figures.js"></script>
    <title>Artisan TMS - Eloquent Relationship Diagram</title>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed" style="">
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" class="header">
        <!--begin::Brand-->
        <div class="container-fluid d-flex flex-stack">
            <!--begin::Brand-->
            <div class="d-flex align-items-center me-5">
                <!--begin::Aside toggle-->
                <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3"
                     id="kt_aside_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
											<path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black"/>
											<path opacity="0.3"
                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                  fill="black"/>
										</svg>
									</span>
                    <!--end::Svg Icon-->
                </div>
                <a href="{{config('laravel-erd.url')}}">
                    <img alt="Logo" src="{{asset('demo8/media/logos/logo-2.svg')}}" class="h-25px h-lg-30px"/>
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-lg-row">
        <div class="aside">
            <div class="aside-menu flex-column-fluid px-5">
                <div class="aside card">
                    <div class="card-header">
                        <h3 class="card-title">Parameters</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-sm text-muted fw-bold">Filter by Relation Type</p>
                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                            <input type="checkbox" class="form-check-input"
                                   id="input-relation-type-checkbox-check-all"/>
                            <label class="form-check-label" for="input-relation-type-checkbox-check-all">
                                Check All
                            </label>
                        </div>
                        <div id="filter-by-relation-type"></div>
                        <div class="separator my-10"></div>
                        <p class="text-sm text-muted fw-bold">Filter by Table Name</p>
                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                            <input type="checkbox" class="form-check-input" id="input-table-names-checkbox-check-all">
                            <label class="form-check-label" for="input-table-names-checkbox-check-all">
                                Check All
                            </label>
                        </div>
                        <div id="filter-by-table-name"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column flex-column-fluid container-fluid">
                <div class="flex-lg-row-fluid">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Eloquent Relationship Diagram</h3>
                        </div>
                        <div class="card-body">
                            <div id="myDiagramDiv" style="background-color: white; width: 100%; height: 70vh"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--begin::Footer-->
<div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
    <!--begin::Container-->
    <div class="{{ theme()->printHtmlClasses('footer-container', false) }} d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">{{ date("Y") }}&copy;</span>
            <a href="{{ theme()->getOption('general', 'website') }}" rel="noreferrer" target="_blank" class="text-gray-800 text-hover-primary">
                Artisan TMS</a>
        </div>
        <!--end::Copyright-->

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Support</a></li>

            <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Privacy Policy</a></li>

            <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Terms & Conditions</a></li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
</div>
<!--end::Footer-->
</body>
    <script>

        var nodeDataArray = [];
        var linkDataArray = [];
        var nodeDataArray = [];
        var linkDataArray = [];

        function init() {
            var $ = go.GraphObject.make; // for conciseness in defining templates

            myDiagram =
                $(go.Diagram, "myDiagramDiv", // must name or refer to the DIV HTML element
                    {
                        allowDelete: false,
                        allowCopy: false,
                        layout: $(go.ForceDirectedLayout),
                        "undoManager.isEnabled": true
                    });

            var itemTempl =
                $(go.Panel, "Horizontal", // this Panel is a row in the containing Table
                    new go.Binding("portId", "name"), // this Panel is a "port"
                    {
                        background: "transparent", // so this port's background can be picked by the mouse
                        fromSpot: go.Spot.Right, // links only go from the right side to the left side
                        toSpot: go.Spot.Left,
                        // allow drawing links from or to this port:
                        fromLinkable: false,
                        toLinkable: false
                    },
                    $(go.Shape, {
                            desiredSize: new go.Size(15, 15),
                            strokeJoin: "round",
                            strokeWidth: 3,
                            stroke: null,
                            margin: 2,
                            // but disallow drawing links from or to this shape:
                            fromLinkable: false,
                            toLinkable: false
                        },
                        new go.Binding("figure", "figure"),
                        new go.Binding("stroke", "color"),
                        new go.Binding("fill", "color")),
                    $(go.TextBlock, {
                            margin: new go.Margin(0, 5),
                            column: 1,
                            font: "13px sans-serif",
                            alignment: go.Spot.Left,
                            // and disallow drawing links from or to this text:
                            fromLinkable: false,
                            toLinkable: false
                        },
                        new go.Binding("text", "name")),
                    $(go.TextBlock, {
                            margin: new go.Margin(0, 5),
                            column: 2,
                            font: "11px courier",
                            alignment: go.Spot.Left
                        },
                        new go.Binding("text", "info"))
                );

            // define the Node template, representing an entity
            myDiagram.nodeTemplate =
                $(go.Node, "Auto", // the whole node panel
                    {
                        selectionAdorned: true,
                        resizable: true,
                        layoutConditions: go.Part.LayoutStandard & ~go.Part.LayoutNodeSized,
                        fromSpot: go.Spot.AllSides,
                        toSpot: go.Spot.AllSides,
                        isShadowed: true,
                        shadowOffset: new go.Point(3, 3),
                        shadowColor: "#C5C1AA"
                    },
                    new go.Binding("location", "location").makeTwoWay(),
                    // whenever the PanelExpanderButton changes the visible property of the "LIST" panel,
                    // clear out any desiredSize set by the ResizingTool.
                    new go.Binding("desiredSize", "visible", function (v) {
                        return new go.Size(NaN, NaN);
                    }).ofObject("LIST"),
                    // define the node's outer shape, which will surround the Table
                    $(go.Shape, "RoundedRectangle", {
                        fill: 'white',
                        stroke: "#eeeeee",
                        strokeWidth: 6
                    }),
                    $(go.Panel, "Table", {
                            margin: 8,
                            stretch: go.GraphObject.Fill
                        },
                        $(go.RowColumnDefinition, {
                            row: 0,
                            sizing: go.RowColumnDefinition.None
                        }),

                        // the table header
                        $(go.TextBlock, {
                                row: 0,
                                alignment: go.Spot.Left,
                                margin: new go.Margin(0, 24, 0, 2), // leave room for Button
                                font: "bold 16px sans-serif"
                            },
                            new go.Binding("text", "key")),
                        // the collapse/expand button
                        $("PanelExpanderButton", "LIST", // the name of the element whose visibility this button toggles
                            {
                                row: 0,
                                alignment: go.Spot.TopRight
                            }),
                        // the list of Panels, each showing an attribute
                        $(go.Panel, "Vertical", {
                                name: "LIST",
                                row: 1,
                                padding: 3,
                                alignment: go.Spot.TopLeft,
                                defaultAlignment: go.Spot.Left,
                                stretch: go.GraphObject.Horizontal,
                                itemTemplate: itemTempl,
                            },
                            new go.Binding("itemArray", "schema"))
                    ) // end Table Panel
                ); // end Node
            // define the Link template, representing a relationship
            myDiagram.linkTemplate =
                $(go.Link, // the whole link panel
                    {
                        selectionAdorned: true,
                        layerName: "Foreground",
                        reshapable: true,
                        routing: go.Link.{{ $routingType }},
                        corner: 5,
                        curve: go.Link.Orthogonal,
                        curviness: 0,
                    },
                    $(go.Shape, // the link shape
                        {
                            stroke: "#303B45",
                            strokeWidth: 1.5,
                        }),
                    $(go.Shape, // the arrowhead
                        {
                            toArrow: "Triangle",
                            fill: "#1967B3"
                        }),
                    $(go.TextBlock, // the "from" label
                        {
                            textAlign: "center",
                            font: "bold 12px sans-serif",
                            stroke: "#1967B3",
                            segmentIndex: 1.5,
                            segmentOffset: new go.Point(NaN, NaN),
                            segmentOrientation: go.Link.Horizontal,
                            fromLinkable: true,
                            toLinkable: true
                        },
                        new go.Binding("text", "fromText")),

                    $(go.TextBlock, // the "to" label
                        {
                            textAlign: "center",
                            font: "bold 12px sans-serif",
                            stroke: "#1967B3",
                            segmentIndex: -10,
                            segmentOffset: new go.Point(NaN, NaN),
                            segmentOrientation: go.Link.OrientUpright,
                            fromLinkable: true,
                            toLinkable: true
                        },
                        new go.Binding("text", "toText"))
                );

            myDiagram.model = $(go.GraphLinksModel, {
                copiesArrays: true,
                copiesArrayObjects: true,
                linkFromPortIdProperty: "fromPort",
                linkToPortIdProperty: "toPort",
                nodeDataArray: nodeDataArray,
                linkDataArray: linkDataArray
            });
            loadFilterByTableNames()
            loadFilterByRelationType()
            setCheckboxesForTableNames();
            setCheckboxesForRelationTypes();
        }


        function loadFilterByRelationType() {
            var json = linkDataArray;
            var appended = [];
            $.each(json, function (i, v) {
                // check if doesn't exist in the array
                if ($.inArray(this.type, appended) == -1) {
                    // append
                    appended.push(this.type)
                    $("#filter-by-relation-type").append($("<div class='form-check form-check-custom form-check-solid form-check-sm mt-1'>").prepend(

                        $("<input>").attr({
                            'type': 'checkbox',
                            'checked': true,
                            'class': 'input-relation-type-checkbox form-check-input',
                            'name': 'subscribe-relation-type',
                            "data-feed": this.type
                        }).val(this.type)
                            .prop('checked', this.checked),

                        $("<label>").attr({
                            'class': 'form-check-label',
                            'for': 'subscribe-relation-type'
                        }).text(this.type)
                    ));
                }
            });
            $(".input-relation-type-checkbox").on('change', function () {
                setCheckboxesForTableNames()
                setCheckboxesForRelationTypes()
            });
        }

        function setCheckboxesForRelationTypes() {
            newLinkDataArray = []

            $(".input-relation-type-checkbox").each(function () {
                if ($(this).prop('checked')) {
                    console.log($(this).val())
                    for (let i = 0; i < linkDataArray.length; i++) {
                        const element = linkDataArray[i];
                        if (element.type == $(this).val()) {
                            newLinkDataArray.push(element)
                        }
                    }
                }
            });
            myDiagram.model.linkDataArray = newLinkDataArray
        }

        function loadFilterByTableNames() {
            var json = nodeDataArray;
            var appended = [];
            $.each(json, function (i, v) {
                // check if doesn't exist in the array
                if ($.inArray(this.key, appended) == -1) {
                    // append
                    appended.push(this.key)
                    $("#filter-by-table-name").append($("<div class='form-check form-check-custom form-check-solid form-check-sm mt-1'>").prepend(
                        $("<input>").attr({
                            'type': 'checkbox',
                            'checked': true,
                            'class': 'input-table-name-checkbox form-check-input',
                            'name': 'subscribe-table-name',
                            "data-feed": this.key
                        }).val(this.key)
                            .prop('checked', this.checked),

                        $("<label>").attr({
                            'class': 'form-check-label',
                            'for': 'subscribe-table-name'
                        }).text(this.key)
                    ));
                }
            });

            $(".input-table-name-checkbox").on('change', function () {
                setCheckboxesForTableNames();
                setCheckboxesForRelationTypes();
            });
        }


        $("#input-relation-type-checkbox-check-all").on('change', function () {
            $(".input-relation-type-checkbox").prop('checked', this.checked);
            setCheckboxesForTableNames();
            setCheckboxesForRelationTypes();
        });

        $("#input-table-names-checkbox-check-all").on('change', function () {
            $(".input-table-name-checkbox").prop('checked', this.checked);
            setCheckboxesForTableNames();
            setCheckboxesForRelationTypes();
        });

        function setCheckboxesForTableNames() {
            newNodeDataArray = []
            newLinkDataArray = []

            $(".input-table-name-checkbox").each(function () {
                if ($(this).prop('checked')) {

                    for (let i = 0; i < nodeDataArray.length; i++) {
                        const element = nodeDataArray[i];
                        if (element.key == $(this).val()) {
                            newNodeDataArray.push(element)
                        }
                    }
                    for (let i = 0; i < linkDataArray.length; i++) {
                        const element = linkDataArray[i];
                        if (element.from == $(this).val() || element.to == $(this).val()) {
                            newLinkDataArray.push(element)
                        }
                    }
                }
            });
            myDiagram.model.nodeDataArray = newNodeDataArray
            myDiagram.model.linkDataArray = newLinkDataArray
        }

        var docs = {!! json_encode($docs) !!}
            docs = JSON.parse(docs)
        nodeDataArray = docs.node_data
        linkDataArray = docs.link_data


        window.addEventListener('DOMContentLoaded', init);

    </script>
</body>
</html>
