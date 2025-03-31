#!/bin/bash
# 仮想環境を有効化 → アプリ実行 → 無効化
source venv/bin/activate
python3 fileEditing.py
deactivate