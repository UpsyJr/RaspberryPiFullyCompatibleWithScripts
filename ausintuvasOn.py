import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

GPIO.setup(22, GPIO.OUT) # this is my set gpio from the raspberry pi, you replace it with our own!!!

GPIO.output(22, False)
