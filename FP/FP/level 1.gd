extends Node2D

func _on_Zona_Jatuh_body_entered(body):
	if body.name == "Hero 1":
		get_tree().change_scene("res://level 1.tscn") # Replace with function body.
