#!/usr/bin/osascript
tell application "Terminal"
    activate
    do script ". /Users/yu/opt/anaconda3/bin/activate && conda activate /Users/yu/opt/anaconda3/envs/Pyxel; "
end tell
