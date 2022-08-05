import { __ } from '@wordpress/i18n';

import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
 
export default function save({ attributes: { style, showImg, imageHeight, imageWidth, imageAlign, img, borderRadius, bgColor, contentSpacing, padding, boxShadow } }) {
	return (
		<div { ...useBlockProps.save() } >
			<div className="card-wrapper"
				style={{background: bgColor,
					borderRadius: borderRadius,
					boxShadow: boxShadow ? "0px 0px 50px 5px #0002" : "none",
					padding: (style == "style2" || style == "style3") ? padding : "0" }}>
				{ showImg &&
				<div class="card-image"
					style={{height: imageHeight,
						width: style == "style3" ? imageHeight : imageWidth,
						borderRadius: style == "style3" ? "10000px" : "0",
						margin: imageAlign == "center" ? "auto" : "initial",
						marginLeft: imageAlign == "left" ? "0" : "auto",
						marginRight: imageAlign == "right" ? "0" : "auto" }}>
					<img class="img" src={img} style={{height: imageHeight}}/>
				</div>
				}
				<div class="card-content"
					style={{padding: style == "style1" ? padding : "0",
							marginTop: (style == "style2" || style == "style3") ? contentSpacing : "0",
							gap: contentSpacing }}>
					<InnerBlocks.Content />
				</div>
			</div>
		</div>
	);
}
