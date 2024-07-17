extends KinematicBody2D

var laju_cepat = 600
var laju_normal = 120
var laju = laju_normal
var kecepatan = Vector2.ZERO
var laju_lompat = -380
var gravitasi = 12
var coins = 0

onready var sprite = $Sprite

func _physics_process(delta):
	kecepatan.y = kecepatan.y + gravitasi
	
	if(Input.is_action_pressed("gerak_kanan")):
		kecepatan.x = laju
	if(Input.is_action_pressed("gerak_kiri")):
		kecepatan.x = -laju
		
	if(Input.is_action_pressed("lari_cepat")):
		lari_cepat()
	
	if(Input.is_action_pressed("lompat") and is_on_floor()):
		kecepatan.y = laju_lompat
	
	kecepatan.x = lerp(kecepatan.x, 0, 0.3)
	kecepatan = move_and_slide(kecepatan, Vector2.UP)

	update_animasi()

func update_animasi():
	if is_on_floor():
		if kecepatan.x < (laju * 0.5) and kecepatan.x > (-laju * 0.5):
			sprite.play("Diam")
		else :
			if laju == laju_normal:
				sprite.play("lari")
			elif laju == laju_cepat:
				sprite.play("lari_cepat")
	else :
		if kecepatan.y > 0:
			#jatuh 
			sprite.play("jatuh")
		else :
			#lompat
			sprite.play("lompat")
	
	sprite.flip_h =  false
	if kecepatan.x < 0:
		sprite.flip_h = true
	
func lari_cepat():
	laju = laju_cepat
	$Timer.start()

func _on_Timer_timeout():
	laju = laju_normal # Replace with function body.

func ambil_coins():
	coins = coins + 1
	print(" COINS: ", coins)
