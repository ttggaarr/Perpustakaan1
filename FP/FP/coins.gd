extends Area2D

func _on_coins_body_entered(body):
	if body.name == 'Hero 1':
		body.ambil_coins()
	var _efek_coins = preload("res://efek_coins.tscn")
	var efek_coins = _efek_coins.instance()
	efek_coins.transform = self.transform
	get_tree().current_scene.add_child(efek_coins)
	queue_free() # Replace with function body.
