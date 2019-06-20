/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */

(function ( $ ) {

    $.fn.floatingSvgBackground = function ( url ) {

        var parent = this;
        var $floatingSvgContainer = null;

        function initialize() {

            var $mainSvg = $floatingSvgContainer.children( 'svg' );


            var fadeTime = 0.5;

            function parsePath( string ) {

                // Split the string into path commands and points
                var pathExp = /[achlmrqstvz]|(-?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/ig;
                var path = string.match( pathExp ).map( function ( n ) {
                    return isNaN( +n ) ? n : +n;
                } );

                // The first element needs to be a number, so remove if it's not
                // Calling the string method will return the path with the removed element
                path.prefix = isNaN( path[ 0 ] ) ? path.shift() : "";
                path.string = function () {
                    return path.prefix + path.join( " " );
                };

                path.addSegment = function ( seg ) {
                    if ( seg.command ) {
                        path.push( seg.command );
                    }
                    for ( var i = 0; i < seg.coords.length; i++ ) {
                        path.push( seg.coords[ i ] );
                    }
                };

                path.connectSegments = function ( index ) {
                    path.length = 0;
                    for ( var i = 0; i <= index; i++ ) {
                        path.addSegment( path.segments[ i ] );
                    }
                };

                return path;
            }

            var logElement = null;

            function resetElementDraw( element ) {

                element.resetCount = element.resetCount != undefined ? element.resetCount++ : 1;

                if ( !element.path ) {
                    return;
                }
                //element.interval && clearInterval( element.interval );
                //element.targetPath.length = 9;
                //element.path.length = 9;
                //element.setAttribute( 'd', element.path.string() );
                //element.path.index = 8;


                var drawSegment = function ( i ) {

                    //extend target path segments into an array
                    element.targetPath.connectSegments( i );

                    //flatten next seg on path
                    if ( i > 0 ) {
                        var prevSegCoords = element.targetPath.segments[ i - 1 ].coords
                        element.path.segments[ i ].fill( prevSegCoords[ prevSegCoords.length - 2 ], prevSegCoords[ prevSegCoords.length - 1 ] );
                    }

                    //extend path segments into an array
                    element.path.connectSegments( i );

                    //reset seg in path by cloning unflattened version
                    element.path.segments[ i ].coords = element.targetPath.segments[ i ].coords.slice();

                    //run animation
                    element.timeline && element.timeline.kill();
                    element.timeline = new TimelineMax()
                        .to( element.path, 1, {
                            endArray: element.targetPath,
                            onUpdate: function () {
                                try {
                                    element.setAttribute( 'd', element.path.string() );
                                } catch ( e ) {
                                }
                                element.style.display = 'block';
                            },
                            onComplete: function () {
                                if ( i < element.path.segments.length - 1 ) {
                                    drawSegment( i + 1 );
                                }
                            },
                            ease: Linear.easeNone
                        } );
                };

                drawSegment( 0 );


            }

            function startShimmerAndDraw( element, shimmerRate ) {

                var tl = new TimelineLite( { onComplete: done } );
                tl.from( element, 1 / shimmerRate, { opacity: 0.2 } )
                    .to( element, 1 / shimmerRate, { opacity: 0.2 } );
                function done() {
                    tl.restart();
                }

                if ( !logElement ) {
                    logElement = element;
                }

                $( element ).addClass( 'animate-flicker-' + Math.round( Math.random() * 4 ) );

                element.fullPath = parsePath( element.getAttribute( 'd' ) );
                element.targetPath = parsePath( element.getAttribute( 'd' ) );
                element.path = parsePath( element.getAttribute( 'd' ) );
                element.complete = true;

                function fill( x, y ) {
                    for ( var i = 0; i < this.coords.length; i += 2 ) {
                        this.coords[ i ] = x;
                        this.coords[ i + 1 ] = y;
                    }
                }

                function segment( path ) {
                    var segs = [];
                    var seg = { command: '', coords: [] };
                    seg.fill = fill.bind( seg );
                    for ( var i = 0; i < path.length; i++ ) {
                        if ( isNaN( path[ i ] ) ) {
                            segs.push( seg );
                            seg = { command: path[ i ], coords: [] }
                            seg.fill = fill.bind( seg );
                        } else {
                            seg.coords.push( path[ i ] );
                        }
                    }
                    segs.push( seg );
                    return segs;
                }

                element.fullPath.segments = segment( element.fullPath );
                element.targetPath.segments = segment( element.targetPath );
                element.path.segments = segment( element.path );

                //$( element ).data( 'fullPath', points );
                //console.log( $( element ).data( 'fullPath' ) );

            }

            function quantize( value, unit ) {
                return Math.round( unit * value ) / unit;
            }

            function resetElement( $element ) {

                if ( !$element[ 0 ].floatDelay ) {
                    $element[ 0 ].floatDelay = Math.random() * 10000;
                } else {
                    $element[ 0 ].floatDelay = 0;
                }

                setTimeout( function () {

                    $elementPaths = $element.find( '[id*=OvOIllustrations] path' );
                    $elementPaths.css( 'display', 'none' );

                    //maximum size change as a scale applied to the original svg size
                    var parallaxMax = 1;

                    //how far from the top of the screen should the drawing start?
                    //if ( !$element.distanceFactor ) {
                    $element.distanceFactor = Math.random();
                    //} else {
                    //    $element.distanceFactor = 1;
                    //}

                    var parallaxFactor = 0;// 0.8 + Math.random() * (parallaxMax - 0.8);
                    var top = $element.distanceFactor * $element.parent()[ 0 ].getBoundingClientRect().height
                        + $element[ 0 ].getBoundingClientRect().height / 2;

                    // change the number at the end of this line to increase or decrease
                    // the time it takes to move the drawing from its starting point
                    // to the top of the screen
                    var floatTime = (parallaxMax - parallaxFactor) * $element.distanceFactor * 80;


                    $element.removeClass( "float draw" );
                    TweenMax.set( $element, { y: top + "px", scale: 2 + parallaxFactor } );

                    $elementPaths.each( function ( index, element ) {
                        resetElementDraw( element );
                    } );

                    //var transition = "opacity " + fadeTime + "s";
                    var left = quantize( Math.random(), 6 ) * 100 + "%";
                    $element.css( "left", left );
                    var tl = new TimelineMax();
                    tl.add( 'start' );
                    tl.add( TweenMax.set( $element, { opacity: 1 } ), 'start' );
                    tl.to( $element, floatTime, {
                        y: -1 * $element[ 0 ].getBoundingClientRect().height + 'px',
                        ease: Linear.easeNone,
                        onComplete: function () {
                            resetElement( $element, 3 )
                        }
                    }, 'start' );
                    //tl.to( $element, fadeTime, { opacity: 0 }, '-=' + fadeTime );
                    //$element.css("transition", transition);
                    $element.addClass( "float show-lines draw" );


                }, $element[ 0 ].floatDelay );


            }

            //shimmer happens on the path level
            $.each( $( '[id*=OvOIllustrations] path' ), function ( index, element ) {
                startShimmerAndDraw( element, 0.5 + Math.random() * 0.5 );
            } );


            //movement happens on the svg level
            // extract groups and make each its own svg
            var pathGroups = [];

            $.each( $( '[id*=OvOIllustrations] > g' ), function ( index, element ) {
                var box = element.getBoundingClientRect();
                pathGroups.push( { element: $( element ), box: box } );
                element.remove();
                $( element ).attr( "transform", "" );
            } );

            $.each( pathGroups, function ( index, group ) {
                var $newSvgElement = $( $mainSvg.clone() );
                $newSvgElement.attr(
                    "viewBox",
                    "0 0 " + group.box.width + " " + group.box.height
                );
                $newSvgElement.attr( "width", group.box.width + "px" );
                $newSvgElement.attr( "height", group.box.height + "px" );
                $newSvgElement.find( "[id*=OvOIllustrations]" ).append( group.element );
                $( $mainSvg )
                    .parent()
                    .append( $newSvgElement );
                resetElement( $newSvgElement );
            } );

            $mainSvg.remove();


            if ( $floatingSvgContainer.hasClass( 'floating-svg-background--hidden' ) ) {
                $floatingSvgContainer.removeClass( 'floating-svg-background--hidden' );
            }

        }

        $floatingSvgContainer = $( '<div class="floating-svg-background floating-svg-background--hidden"></div>' );
        parent.prepend( $floatingSvgContainer );
        $floatingSvgContainer.load( url, null, initialize );


    };

}( jQuery ));


/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */
/* OVO VERSION */