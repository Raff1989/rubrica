function Router()
{
	console.log("router.js", "ready");
	var self = this;

	$(document).ready(function(){
		console.log("router.js", "document", "ready", "registering_a_click");
		
		$(window).on('hashchange', function() {
			console.log("router.js", "hashchange", window.location.hash);
			
			try
			{
				var pageObject = JSON.parse(decodeURIComponent(window.location.hash.split("#")[1]));
				self.loadPage(pageObject.pageName);
			}
			catch(e)
			{
				
			}
		});

		$(document).on("click", "a", function(event){
			console.log("router.js", "a", "click", "eventReceived");
			
			event.preventDefault();
			var pageName = $(this).attr("href");
			window.location.hash = JSON.stringify({pageName: pageName});
		});
		
		
		var pageName = app.config.homePageName;
		if(window.location.hash != "")
		{
			var pageObject = JSON.parse(decodeURIComponent(window.location.hash.split("#")[1]));
			self.loadPage(pageObject.pageName);
		}
		
		try
		{
			console.log("router.js", "document", "ready", "loading first page", pageName);
			
			var pageObject = JSON.parse(decodeURIComponent(window.location.hash.split("#")[1]));
			if(pageObject.pageName === pageName)
			{
				self.loadPage(pageName);
			}
			else
			{
				window.location.hash = JSON.stringify({pageName: pageName});
			}
		}
		catch(e)
		{
			console.log("router.js", "document", "ready", "error loading first page", e);
			window.location.hash = JSON.stringify({pageName: pageName});
		}
	});

	this.loadPage = function(pageName)
	{
		console.log("router.js", "loadPage", "pageName", pageName);
		
		$.ajax(pageName + ".html").done(function(data){
			data = data.split("inject$uuid").join(app.helpers.generateUUID());
			$("[view]").html(data);
			
			app.component.renderComponents("[view]");
		})
		console.log("router.js", "loadPage", "pageName", pageName);
		
	}
	
	this.setPage = function(pageName, params = {})
	{
		window.location.hash = JSON.stringify({pageName: pageName, params: params});
	}
	
	this.getParameter = function(parameterName)
	{
		var pageObject = JSON.parse(decodeURIComponent(window.location.hash.split("#")[1]));
		return pageObject.params[parameterName];
	}
}

app.router = new Router();