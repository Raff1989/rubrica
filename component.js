function Component()
{
	console.log("component.js", "ready");
	var self = this;

	this.loadComponent = function(componentName, el)
	{
		console.log("component.js", "loadComponent", "componentName", componentName);
		
		$.ajax(componentName + ".html").done(function(data){
			console.log("component html loaded", data);
			data = data.split("inject$uuid").join(app.helpers.generateUUID());
			$(el).html(data);
			
			self.renderComponents(el);
		})
		
	}
	
	this.renderComponents = function(el)
	{
		$(el).find("[component-id]").each(function(e){
			console.log("ciao", e);
			
			var componentName = $(this).attr("component-id");
			
			self.loadComponent(componentName, $(this));
		});
	}
}

app.component = new Component();