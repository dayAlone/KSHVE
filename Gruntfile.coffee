module.exports = (grunt)->

	grunt.initConfig
		pkg: grunt.file.readJSON 'package.json'

		# Переменные папок
		path:
			sources : 'sources'
			layout  : 'public_html/layout'

		files:
			css:
				frontend : '<%= path.layout %>/css/frontend.css'
				develop  : '<%= path.sources %>/css/style.styl'
				sources : [
							'./bower_components/bootstrap/dist/css/bootstrap.css'
							'./bower_components/animate.css/animate.css'
							'./bower_components/slick-carousel/slick/slick.css'
							'./bower_components/prettyPhoto/css/prettyPhoto.css'
							'<%= path.sources %>/css/style.css'
					]
			js:
				frontend : '<%= path.layout %>/js/frontend.js'
				develop  : '<%= path.sources %>/js/script.coffee'
				sources  : [
							'./bower_components/jquery/dist/jquery.js'
							'./bower_components/bootstrap/dist/js/bootstrap.js'
							'./bower_components/arctext.js/js/jquery.arctext.js'
							'./bower_components/fotorama/fotorama.js'
							'./bower_components/slick-carousel/slick/slick.js'
							'./bower_components/prettyPhoto/js/jquery.prettyPhoto.js'
							'./bower_components/jquery.cookie/jquery.cookie.js'
							'./bower_components/jQuery-Mask-Plugin/jquery.mask.js'
							'./bower_components/parsleyjs/dist/parsley.js'
							'./bower_components/jquery.browser/dist/jquery.browser.js'
							'<%= path.sources %>/js/script.js'
						]

		# Настройка уведомлений
		notify_hooks: 
			options:
				enabled: true
				max_jshint_notifications: 5
		notify:
			css:
				options:
					title: 'CSS Compile Complete'
					message: 'Stylus, CSS Comb, CSS Min, Autoprefixee & Concat finished running'
			js:
				options:
					title: 'JavaScript Compile Complete'
					message: 'CoffeScript, Concat & Uglify finished running'
			image:
				options:
					title: 'Images Compile Complete'
					message: 'ImageMin finished running'
			svg:
				options:
					title: 'SVG Files Compile Complete'
					message: 'SVGMin finished running'
			html:
				options:
					title: 'HTMLs Compile Complete'
					message: 'Jade finished running'

		# Оптимизируем SVG
		svgmin:
			dist:
				files: [{
					expand: true
					cwd: '<%= path.sources %>/images/svg/'
					src: ['**/*.svg']
					dest: '<%= path.layout %>/images/svg/'
				}]

		# Копирование картинок из плагинов
		copy:
			main:
				files: [
					{ expand: true, flatten: true, src: ['./bower_components/fotorama/*.png'], dest: '<%= path.sources %>/images/plugins/', filter: 'isFile' }
					{ expand: true, flatten: true, src: ['./bower_components/bootstrap/dist/css/bootstrap.css.map'], dest: '<%= path.sources %>/css/', filter: 'isFile' }
					{ expand: true, flatten: true, src: ['./bower_components/prettyPhoto/images/prettyPhoto/default/*.png'], dest: '<%= path.sources %>/images/plugins/', filter: 'isFile' }
				]

		# Уменьшение размера изображений
		imagemin:
			png:
				options: 
					optimizationLevel: 7
				files: [{
					expand: true
					cwd: '<%= path.sources %>/images/'
					src: ['**/*.png']
					dest: '<%= path.layout %>/images/'
					}]
			jpg:
				options: 
					progressive: true
				files: [{
					expand: true
					cwd: '<%= path.sources %>/images/'
					src: ['**/*.jpg']
					dest: '<%= path.layout %>/images/'
					}]

		# Конвертируем Stylus -> CSS
		stylus:
			options:
				compress: false
			compile:
				files:
					'<%= path.sources %>/css/style.css' : '<%= path.sources %>/css/style.styl'

		# Конвертируем CoffeeScript -> JavaScript
		coffee:
			compile:
				files: 
					'<%= path.sources %>/js/script.js' : ['<%= files.js.develop %>']

		# Собираем JS и CSS в один файл
		concat:
			js_frontend:
				src  : ['<%= files.js.sources %>']
				dest : '<%= files.js.frontend %>'
				options:
					separator: ';'
			css_frontend:
				src  : ['<%= files.css.sources %>']
				dest : '<%= files.css.frontend %>'

		# Причесываем CSS
		csscomb:
			css_frontend:
				options:
					config: './node_modules/grunt-csscomb/node_modules/csscomb/config/yandex.json'
				files:
					'<%= files.css.frontend %>' : [ '<%= files.css.frontend %>' ]

		# Сжимаем CSS
		cssmin:
			options:
				keepSpecialComments: 0
				report: 'gzip'
			css_frontend:
				files:
					'<%= files.css.frontend %>' : [ '<%= files.css.frontend %>' ]

		# Сжимаем JS
		uglify:
			options:
				mangle: true
				compress: true
				report: 'gzip'
			frontend:
				files:
					'<%= files.js.frontend %>' : [ '<%= files.js.frontend %>' ]


		# Генерируем HTML страницы
		jade:
			compile:
				options:
					pretty: true
					#data: 
						#products : grunt.file.readJSON('./sources/html/includes/products.json')
				files:	[{
					expand : true
					cwd    : '<%= path.sources %>/html/'
					src    : ['**/*.jade', '!**/includes/**']
					dest   : '<%= path.layout %>/../'
					ext    : '.html'
				}]
					
 

		# Бдим за изменениями и все пересобираем при необходимости
		watch:
			js_frontend:
				files   : ['<%= files.js.sources %>', '<%= files.js.develop %>']
				tasks   : ['coffee', 'concat:js_frontend', 'notify:js' ]
				options :
						livereload: 11111111
			css_frontend:
				files   : ['<%= files.css.sources %>', '<%= files.css.develop %>']
				tasks   : ['stylus', 'concat:css_frontend', 'csscomb', 'notify:css' ]
				options :
						livereload: 11111111
			images:
				files: ['<%= path.sources %>/images/**/*.jpg', '<%= path.sources %>/images/**/*.png']
				tasks   : ['copy', 'imagemin', 'notify:image' ]
				options :
						livereload: 11111111
			svg:
				files   : ['<%= path.sources %>/images/svg/*.svg']
				tasks   : ['svgmin', 'jade', 'notify:svg' ]
				options :
						livereload: 11111111
			html:
				files   : ['<%= path.sources %>/html/*.jade', '<%= path.sources %>/html/**/*.jade']
				tasks   : ['jade', 'notify:html']
				options :
						livereload: 11111111

	
	
	grunt.loadNpmTasks 'grunt-autoprefixer'
	grunt.loadNpmTasks 'grunt-contrib-coffee'
	grunt.loadNpmTasks 'grunt-contrib-concat'
	grunt.loadNpmTasks 'grunt-contrib-copy'
	grunt.loadNpmTasks 'grunt-contrib-cssmin'
	grunt.loadNpmTasks 'grunt-contrib-imagemin'
	grunt.loadNpmTasks 'grunt-contrib-stylus'
	grunt.loadNpmTasks 'grunt-contrib-uglify'
	grunt.loadNpmTasks 'grunt-contrib-jade'
	grunt.loadNpmTasks 'grunt-contrib-watch'
	grunt.loadNpmTasks 'grunt-notify'
	grunt.loadNpmTasks 'grunt-csscomb'
	grunt.loadNpmTasks 'grunt-svgmin'
	

	grunt.registerTask 'default', ['watch']

	grunt.registerTask 'compile', ['svgmin', 'copy', 'imagemin', 'stylus', 'coffee', 'concat', 'csscomb', 'cssmin', 'uglify', 'jade']

	grunt.task.run 'notify_hooks'
