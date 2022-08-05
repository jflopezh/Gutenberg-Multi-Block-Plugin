import { __ } from '@wordpress/i18n';
import { useBlockProps,
		 InspectorControls,
		 AlignmentToolbar,
		 InnerBlocks, 
		 MediaUpload, 
		 MediaUploadCheck } from '@wordpress/block-editor';
import { Button,
		 Panel,
		 PanelBody,
		 PanelRow,
		 BaseControl,
		 SelectControl,
		 RadioControl,
		 ToggleControl,
		 __experimentalUnitControl as UnitControl,
		 ColorPicker } from '@wordpress/components';
import './editor.scss';
import closeIcon from '../../../resources/img/icon-close.png';
 
export default function edit({ attributes: { style, showImg, imageHeight, imageWidth, imageAlign, img, borderRadius, bgColor, contentSpacing, padding, boxShadow }, setAttributes }) {
	function CardImage() {
		if (showImg) {
			if (img === '') {
				return (
					<div class="card-image" 
						style={{height: imageHeight,
								width: style == "style3" ? imageHeight : imageWidth,
								borderRadius: style == "style3" ? "10000px" : "0",
								margin: imageAlign == "center" ? "auto" : "initial",
								marginLeft: imageAlign == "left" ? "0" : "auto",
								marginRight: imageAlign == "right" ? "0" : "auto" }}>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) => setAttributes({ img: media.url })}
								allowedTypes={'image/*'}
								value={img}
								render={({ open }) => (
									<Button onClick={open} isPrimary={true}>Open Media Library</Button>
								)} />
						</MediaUploadCheck>
					</div>
				);
			} else {
				return (
					<div class="card-image" 
						style={{height: imageHeight,
							width: style == "style3" ? imageHeight : imageWidth,
							borderRadius: style == "style3" ? "10000px" : "0",
							margin: imageAlign == "center" ? "auto" : "initial",
							marginLeft: imageAlign == "left" ? "0" : "auto",
							marginRight: imageAlign == "right" ? "0" : "auto" }}>
						<img class="img" src={img} style={{height: imageHeight}}/>
						<div class="overlay">
							<img class="delete-image" onClick={() => setAttributes({ img: '' })} src={closeIcon} width="30px" height="30px" />
						</div>
					</div>
				);
			}
		}

		return null;
	}					

	return (
		<>
		<InspectorControls>
			<Panel header="Card Settings">
				<PanelBody>
					<PanelRow>
						<SelectControl
							label={ __( 'Select style:' ) }
							value={ style }
							onChange={ ( select ) => setAttributes({ style: select }) }
							options={ [
								{ value: 'style1', label: __('Full Image', 'g-blocks') },
								{ value: 'style2', label: __('Contained Image', 'g-blocks') },
								{ value: 'style3', label: __('Circular Image', 'g-blocks') },
							] }
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Display image"
							checked={showImg}
							onChange={(state) => setAttributes({ showImg: state })} />
					</PanelRow>
					{ showImg &&
					<>
						<PanelRow>
							<UnitControl
								label="Image height"
								onChange={(value) => setAttributes({ imageHeight: value }) }
								value={imageHeight} />
						</PanelRow>
						{ style == 'style2' &&
							<PanelRow>
								<UnitControl
									label="Image width"
									onChange={(value) => setAttributes({ imageWidth: value }) }
									value={imageWidth} />
							</PanelRow>
						}
						{ (style == 'style2' || style == 'style3') &&
							<PanelRow>
								<RadioControl
									label="Image align"
									selected={ imageAlign }
									options={ [
										{ label: 'Left', value: 'left' },
										{ label: 'Center', value: 'center' },
										{ label: 'Right', value: 'right' },
									] }
									onChange={ ( option ) => setAttributes({ imageAlign: option }) }
								/>
							</PanelRow>
						}
					</>
					}
					<PanelRow>
						<UnitControl
							label="Border radius"
							onChange={(value) => setAttributes({ borderRadius: value })}
							value={borderRadius} />
					</PanelRow>
					<PanelRow>
						<BaseControl
							label="Background color" >
							<ColorPicker
								onChange={(color) => setAttributes({ bgColor: color })}
								color={bgColor} />
						</BaseControl>
					</PanelRow>
					<PanelRow>
						<UnitControl
							label="Content spacing"
							onChange={(value) => setAttributes({ contentSpacing: value })}
							value={contentSpacing} />
					</PanelRow>
					<PanelRow>
						<UnitControl
							label="Padding"
							onChange={(value) => setAttributes({ padding: value })}
							value={padding} />
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label="Box shadow"
							checked={boxShadow}
							onChange={(state) => setAttributes({ boxShadow: state })} />
					</PanelRow>
				</PanelBody>
			</Panel>
		</InspectorControls>

		<div { ...useBlockProps()} templateInsertUpdatesSelection={ true }>
			<div class="card-wrapper" 
				style={{background: bgColor,
						borderRadius: borderRadius,
						boxShadow: boxShadow ? "0px 0px 50px 5px #0002" : "none",
						padding: (style == "style2" || style == "style3") ? padding : "0" }}>
				<CardImage />
				<div class="card-content" 
					style={{ padding: style == "style1" ? padding : "0",
							 marginTop: (style == "style2" || style == "style3") ? contentSpacing : "0",
							 gap: contentSpacing }}>
					<InnerBlocks
							allowedBlocks={ [ 'core/heading', 'core/paragraph', 'core/buttons' ] }
							template={[	[ 'core/heading', { placeholder: 'Heading', templateInsertUpdatesSelection: false } ],
										[ 'core/paragraph', { placeholder: 'Card text', templateInsertUpdatesSelection: false } ],
										[ 'core/buttons', { placeholder: 'Button text', templateInsertUpdatesSelection: false } ]  ]}
							templateInsertUpdatesSelection={ false }
						/>
				</div>
			</div>
		</div>
		</>
	);
}