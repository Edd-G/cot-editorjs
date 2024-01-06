document.addEventListener("DOMContentLoaded", function() {
	const editor = new EditorJS({
		holder: 'editorjs',
		tools: {
			header: {
				class: Header,
				inlineToolbar: true,
				config: {
					placeholder: 'Enter a header',
					levels: [1, 2, 3, 4],
					defaultLevel: 1,
					defaultAlignment: 'left'
				}
			},
			paragraph: {
				class: Paragraph,
				inlineToolbar: true,
				logLevel: 'WARN',
			},
			list: List,
			// list: {
			// 	class: NestedList,
			// 	inlineToolbar: true,
			// 	config: {
			// 		defaultStyle: 'unordered'
			// 	},
			// },
			raw: RawTool,
			// image: InlineImage,
			// image: ImageTool,
			image: SimpleImage,
			embed: {
				class: Embed,
				inlineToolbar: true,
				config: {
					services: {
						// youtube: {
						// 	height: 450,
						// },
						youtube: true,
						coub: true,
						instagram: true,
					}
				}
			},
			linkTool: {
				class: LinkTool,
				config: {
					endpoint: 'http://localhost/test/codex-dev/get-metadata.php',
				}
			},
			delimiter: Delimiter,
			inlineCode: InlineCode,
			Marker: Marker,
			underline: Underline,
			alert: Alert,
			warning: Warning,
			table: {
				class: Table,
				inlineToolbar: true,
				config: {
					rows: 2,
					cols: 3,
				},
			},
			code: CodeTool,
			quote: {
				class: Quote,
				inlineToolbar: true,
				config: {
					quotePlaceholder: 'Укажите цитату',
					captionPlaceholder: 'Автор цитаты',
				},
			},

		},
		logLevel: 'WARN',
		// autofocus: true,
		placeholder: 'Напишите здесь свою историю!',
		/**
		 * Internationalzation config
		 */
		i18n: i18n,
		/**
		 * Previously saved data that should be rendered
		 */
		data: {},
		onReady: async () => {
			// console.log('Editor.js ready to use');
		},
		onChange: function(api, event) {
			// console.log('something changed', event);
		}
	});
});
